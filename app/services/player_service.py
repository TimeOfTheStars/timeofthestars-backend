from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Player import Player
from app.schemas import PlayerCreate, PlayerUpdate


async def list_players(db: AsyncSession) -> Sequence[Player]:
    result = await db.execute(select(Player).order_by(Player.id))
    return result.scalars().all()


async def get_player(db: AsyncSession, player_id: int) -> Player | None:
    result = await db.execute(select(Player).where(Player.id == player_id))
    return result.scalar_one_or_none()


async def create_player(db: AsyncSession, data: PlayerCreate) -> Player:
    player = Player(**data.model_dump())
    db.add(player)
    await db.flush()
    await db.refresh(player)
    return player


async def update_player(db: AsyncSession, player_id: int, data: PlayerUpdate) -> Player | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_player(db, player_id)
    await db.execute(update(Player).where(Player.id == player_id).values(**payload))
    result = await db.execute(select(Player).where(Player.id == player_id))
    return result.scalar_one_or_none()


async def delete_player(db: AsyncSession, player_id: int) -> bool:
    result = await db.execute(delete(Player).where(Player.id == player_id).returning(Player.id))
    return result.scalar_one_or_none() is not None






