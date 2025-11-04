from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Championship import Championship
from app.schemas import ChampionshipCreate, ChampionshipUpdate


async def list_championships(db: AsyncSession) -> Sequence[Championship]:
    result = await db.execute(select(Championship).order_by(Championship.id))
    return result.scalars().all()


async def get_championship(db: AsyncSession, championship_id: int) -> Championship | None:
    result = await db.execute(select(Championship).where(Championship.id == championship_id))
    return result.scalar_one_or_none()


async def create_championship(db: AsyncSession, data: ChampionshipCreate) -> Championship:
    item = Championship(**data.model_dump())
    db.add(item)
    await db.flush()
    await db.refresh(item)
    return item


async def update_championship(db: AsyncSession, championship_id: int, data: ChampionshipUpdate) -> Championship | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_championship(db, championship_id)
    await db.execute(
        update(Championship).where(Championship.id == championship_id).values(**payload)
    )
    result = await db.execute(select(Championship).where(Championship.id == championship_id))
    return result.scalar_one_or_none()


async def delete_championship(db: AsyncSession, championship_id: int) -> bool:
    result = await db.execute(
        delete(Championship)
        .where(Championship.id == championship_id)
        .returning(Championship.id)
    )
    return result.scalar_one_or_none() is not None


