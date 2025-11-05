from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Tournament import Tournament
from app.db.models.TournamentTeams import TournamentTeams
from app.db.models.TournamentPlayers import TournamentPlayers
from app.db.models.TournamentGames import TournamentGames
from app.db.models.Team import Team
from app.db.models.Player import Player
from app.db.models.Game import Game
from app.schemas import TournamentCreate, TournamentUpdate


async def list_tournaments(db: AsyncSession) -> Sequence[Tournament]:
    result = await db.execute(select(Tournament).order_by(Tournament.id))
    return result.scalars().all()


async def get_tournament(db: AsyncSession, tournament_id: int) -> Tournament | None:
    result = await db.execute(select(Tournament).where(Tournament.id == tournament_id))
    return result.scalar_one_or_none()


async def create_tournament(db: AsyncSession, data: TournamentCreate) -> Tournament:
    item = Tournament(**data.model_dump())
    db.add(item)
    await db.flush()
    await db.refresh(item)
    return item


async def update_tournament(db: AsyncSession, tournament_id: int, data: TournamentUpdate) -> Tournament | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_tournament(db, tournament_id)
    await db.execute(
        update(Tournament).where(Tournament.id == tournament_id).values(**payload)
    )
    result = await db.execute(select(Tournament).where(Tournament.id == tournament_id))
    return result.scalar_one_or_none()


async def delete_tournament(db: AsyncSession, tournament_id: int) -> bool:
    result = await db.execute(
        delete(Tournament).where(Tournament.id == tournament_id).returning(Tournament.id)
    )
    return result.scalar_one_or_none() is not None


# Linking operations
async def add_team(db: AsyncSession, tournament_id: int, team_id: int) -> None:
    exists_q = select(TournamentTeams.id).where(
        TournamentTeams.tournament_id == tournament_id,
        TournamentTeams.team_id == team_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = TournamentTeams(tournament_id=tournament_id, team_id=team_id)
        db.add(link)


async def remove_team(db: AsyncSession, tournament_id: int, team_id: int) -> bool:
    result = await db.execute(
        delete(TournamentTeams)
        .where(
            TournamentTeams.tournament_id == tournament_id,
            TournamentTeams.team_id == team_id,
        )
        .returning(TournamentTeams.id)
    )
    return result.scalar_one_or_none() is not None


async def add_player(
    db: AsyncSession,
    tournament_id: int,
    team_id: int,
    player_id: int,
    number: int | None,
) -> None:
    exists_q = select(TournamentPlayers.id).where(
        TournamentPlayers.tournament_id == tournament_id,
        TournamentPlayers.team_id == team_id,
        TournamentPlayers.player_id == player_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = TournamentPlayers(
            tournament_id=tournament_id,
            team_id=team_id,
            player_id=player_id,
            number=number,
        )
        db.add(link)


async def remove_player(
    db: AsyncSession, tournament_id: int, team_id: int, player_id: int
) -> bool:
    result = await db.execute(
        delete(TournamentPlayers)
        .where(
            TournamentPlayers.tournament_id == tournament_id,
            TournamentPlayers.team_id == team_id,
            TournamentPlayers.player_id == player_id,
        )
        .returning(TournamentPlayers.id)
    )
    return result.scalar_one_or_none() is not None


async def add_game(db: AsyncSession, tournament_id: int, game_id: int) -> None:
    exists_q = select(TournamentGames.id).where(
        TournamentGames.tournament_id == tournament_id,
        TournamentGames.game_id == game_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = TournamentGames(tournament_id=tournament_id, game_id=game_id)
        db.add(link)


async def remove_game(db: AsyncSession, tournament_id: int, game_id: int) -> bool:
    result = await db.execute(
        delete(TournamentGames)
        .where(
            TournamentGames.tournament_id == tournament_id,
            TournamentGames.game_id == game_id,
        )
        .returning(TournamentGames.id)
    )
    return result.scalar_one_or_none() is not None


# Get methods with statistics
async def get_tournament_teams(db: AsyncSession, tournament_id: int) -> Sequence[dict]:
    """Возвращает команды в турнире со статистикой"""
    result = await db.execute(
        select(TournamentTeams, Team)
        .join(Team, TournamentTeams.team_id == Team.id)
        .where(TournamentTeams.tournament_id == tournament_id)
        .order_by(Team.name)
    )
    rows = result.all()
    
    teams = []
    for tt, team in rows:
        teams.append({
            "id": team.id,
            "name": team.name,
            "slug": team.slug,
            "city": team.city,
            "players_count": team.players_count,
            "logo_url": team.logo_url,
            "stats": {
                "wins": tt.wins,
                "losses": tt.losses,
                "draws": tt.draws,
                "goals_scored": tt.goals_scored,
                "goals_conceded": tt.goals_conceded,
                "games": tt.games,
                "extra_points": tt.extra_points,
            }
        })
    return teams


async def get_tournament_players(db: AsyncSession, tournament_id: int) -> Sequence[dict]:
    """Возвращает игроков в турнире со статистикой"""
    result = await db.execute(
        select(TournamentPlayers, Player, Team)
        .join(Player, TournamentPlayers.player_id == Player.id)
        .join(Team, TournamentPlayers.team_id == Team.id)
        .where(TournamentPlayers.tournament_id == tournament_id)
        .order_by(Team.name, TournamentPlayers.number)
    )
    rows = result.all()
    
    players = []
    for tp, player, team in rows:
        players.append({
            "id": player.id,
            "full_name": player.full_name,
            "birth_date": player.birth_date,
            "position": player.position,
            "grip": player.grip,
            "photo_url": player.photo_url,
            "team_id": team.id,
            "team_name": team.name,
            "stats": {
                "number": tp.number,
                "matches": tp.matches,
                "goals": tp.goals,
                "assists": tp.assists,
                "penalties": tp.penalties,
                "gaa": tp.gaa,
            }
        })
    return players


async def get_tournament_games(db: AsyncSession, tournament_id: int) -> Sequence[Game]:
    """Возвращает игры в турнире"""
    result = await db.execute(
        select(Game)
        .join(TournamentGames, Game.id == TournamentGames.game_id)
        .where(TournamentGames.tournament_id == tournament_id)
        .order_by(Game.date, Game.time)
    )
    return result.scalars().all()





