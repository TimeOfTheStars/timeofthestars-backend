from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Tournament import Tournament
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


