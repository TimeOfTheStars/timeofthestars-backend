from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Team import Team
from app.schemas import TeamCreate, TeamUpdate


async def list_teams(db: AsyncSession) -> Sequence[Team]:
    result = await db.execute(select(Team).order_by(Team.id))
    return result.scalars().all()


async def get_team(db: AsyncSession, team_id: int) -> Team | None:
    result = await db.execute(select(Team).where(Team.id == team_id))
    return result.scalar_one_or_none()


async def create_team(db: AsyncSession, data: TeamCreate) -> Team:
    team = Team(**data.model_dump())
    db.add(team)
    await db.flush()
    await db.refresh(team)
    return team


async def update_team(db: AsyncSession, team_id: int, data: TeamUpdate) -> Team | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_team(db, team_id)
    await db.execute(update(Team).where(Team.id == team_id).values(**payload))
    result = await db.execute(select(Team).where(Team.id == team_id))
    return result.scalar_one_or_none()


async def delete_team(db: AsyncSession, team_id: int) -> bool:
    result = await db.execute(delete(Team).where(Team.id == team_id).returning(Team.id))
    return result.scalar_one_or_none() is not None






