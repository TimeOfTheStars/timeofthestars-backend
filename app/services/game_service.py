from collections.abc import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Game import Game
from app.db.models.ChampionshipGames import ChampionshipGames
from app.db.models.TournamentGames import TournamentGames
from app.schemas import GameCreate, GameUpdate
from app.services import championship_service, tournament_service


async def list_games(db: AsyncSession) -> Sequence[Game]:
    result = await db.execute(select(Game).order_by(Game.id))
    return result.scalars().all()


async def get_game(db: AsyncSession, game_id: int) -> Game | None:
    result = await db.execute(select(Game).where(Game.id == game_id))
    return result.scalar_one_or_none()


async def create_game(db: AsyncSession, data: GameCreate) -> Game:
    item = Game(**data.model_dump())
    db.add(item)
    await db.flush()
    await db.refresh(item)
    return item


async def update_game(db: AsyncSession, game_id: int, data: GameUpdate) -> Game | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_game(db, game_id)
    
    # Получаем текущие значения, чтобы понять, действительно ли изменились счета
    current_game_result = await db.execute(select(Game).where(Game.id == game_id))
    current_game = current_game_result.scalar_one_or_none()
    if current_game is None:
        return None

    old_a = current_game.score_team_a
    old_b = current_game.score_team_b

    new_a = payload.get("score_team_a", old_a)
    new_b = payload.get("score_team_b", old_b)

    # Пересчитываем статистику только если счета действительно изменились
    score_updated = (old_a != new_a) or (old_b != new_b)
    
    await db.execute(update(Game).where(Game.id == game_id).values(**payload))
    result = await db.execute(select(Game).where(Game.id == game_id))
    updated_game = result.scalar_one_or_none()
    
    # Если обновлены результаты, пересчитываем статистику во всех связанных турнирах/чемпионатах
    if score_updated and updated_game:
        # Находим все чемпионаты, где участвует эта игра
        championships_result = await db.execute(
            select(ChampionshipGames.championship_id)
            .where(ChampionshipGames.game_id == game_id)
        )
        championship_ids = [row[0] for row in championships_result.all()]
        
        # Находим все турниры, где участвует эта игра
        tournaments_result = await db.execute(
            select(TournamentGames.tournament_id)
            .where(TournamentGames.game_id == game_id)
        )
        tournament_ids = [row[0] for row in tournaments_result.all()]
        
        # Пересчитываем статистику для всех связанных чемпионатов
        for championship_id in championship_ids:
            await championship_service.recalculate_championship_teams_stats(
                db, championship_id, game_id
            )
        
        # Пересчитываем статистику для всех связанных турниров
        for tournament_id in tournament_ids:
            await tournament_service.recalculate_tournament_teams_stats(
                db, tournament_id, game_id
            )
    
    return updated_game


async def delete_game(db: AsyncSession, game_id: int) -> bool:
    result = await db.execute(delete(Game).where(Game.id == game_id).returning(Game.id))
    return result.scalar_one_or_none() is not None






