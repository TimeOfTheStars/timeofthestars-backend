from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Game import Game
from app.schemas import GameCreate, GameUpdate


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
    await db.execute(update(Game).where(Game.id == game_id).values(**payload))
    result = await db.execute(select(Game).where(Game.id == game_id))
    return result.scalar_one_or_none()


async def delete_game(db: AsyncSession, game_id: int) -> bool:
    result = await db.execute(delete(Game).where(Game.id == game_id).returning(Game.id))
    return result.scalar_one_or_none() is not None






