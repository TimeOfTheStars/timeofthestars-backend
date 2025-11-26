from sqlalchemy import Column, Integer, String, Date, ForeignKey, Time, event, inspect
from sqlalchemy.orm import relationship, Session
import asyncio
import threading
from app.db import Base

class Game(Base):
    __tablename__ = "games"

    id = Column(Integer, primary_key=True, index=True)

    team_a_id = Column(Integer, ForeignKey("teams.id"), nullable=False)
    team_b_id = Column(Integer, ForeignKey("teams.id"), nullable=False)

    score_team_a = Column(Integer, nullable=True)
    score_team_b = Column(Integer, nullable=True)

    date = Column(Date, nullable=False)
    time = Column(Time, nullable=False)
    location = Column(String, nullable=False)
    scan = Column(String, nullable=True)
    video_url = Column(String, nullable=True)

    bullet_win_team = Column(Integer, ForeignKey("teams.id"), nullable=True)

    team_a = relationship("Team", foreign_keys=[team_a_id])
    team_b = relationship("Team", foreign_keys=[team_b_id])
    bullet_team = relationship("Team", foreign_keys=[bullet_win_team])

    # Links to tournaments/championships
    championship_links = relationship("ChampionshipGames", back_populates="game", cascade="all, delete-orphan")
    tournament_links = relationship("TournamentGames", back_populates="game", cascade="all, delete-orphan")

    def __repr__(self):
        return f"({self.id}) {self.team_a_id} vs {self.team_b_id}"


# Thread-local storage to accumulate changed game IDs between flush and commit
_thread_local = threading.local()

def _get_game_tasks():
    if not hasattr(_thread_local, 'games'):
        _thread_local.games = set()
    return _thread_local.games


def _after_flush_collect_changed_games(session: Session, flush_context):
    tasks = _get_game_tasks()
    for obj in session.dirty:
        if isinstance(obj, Game):
            state = inspect(obj)
            changed = False
            for attr_name in ("score_team_a", "score_team_b"):
                hist = getattr(state.attrs, attr_name).history
                if hist.has_changes():
                    changed = True
                    break
            if changed and obj.score_team_a is not None and obj.score_team_b is not None:
                tasks.add(obj.id)


def _after_commit_recalculate_games(session: Session):
    tasks = _get_game_tasks()
    if not tasks:
        return
    game_ids = list(tasks)
    tasks.clear()
    _schedule_async_task(_async_recalculate_games_stats, game_ids)


def _schedule_async_task(coro, *args):
    try:
        loop = asyncio.get_event_loop()
        if loop.is_running():
            asyncio.create_task(coro(*args))
        else:
            loop.run_until_complete(coro(*args))
    except RuntimeError:
        loop = asyncio.new_event_loop()
        asyncio.set_event_loop(loop)
        loop.run_until_complete(coro(*args))
        loop.close()


async def _async_recalculate_games_stats(game_ids: list[int]):
    from app.db.base import session_maker
    from app.db.models import ChampionshipGames, TournamentGames
    from sqlalchemy import select
    from app.services import championship_service, tournament_service

    async with session_maker() as session:
        try:
            for game_id in game_ids:
                # Championship recalculations
                champ_result = await session.execute(
                    select(ChampionshipGames.championship_id).where(ChampionshipGames.game_id == game_id)
                )
                for (championship_id,) in champ_result.all():
                    await championship_service.recalculate_championship_teams_stats(session, championship_id, game_id)

                # Tournament recalculations
                tourn_result = await session.execute(
                    select(TournamentGames.tournament_id).where(TournamentGames.game_id == game_id)
                )
                for (tournament_id,) in tourn_result.all():
                    await tournament_service.recalculate_tournament_teams_stats(session, tournament_id, game_id)
            await session.commit()
        except Exception:  # Log minimal to avoid noise
            await session.rollback()


event.listen(Session, 'after_flush', _after_flush_collect_changed_games)
event.listen(Session, 'after_commit', _after_commit_recalculate_games)