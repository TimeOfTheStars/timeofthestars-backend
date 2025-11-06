from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import TeamCreate, TeamUpdate, TeamRead
from app.services import team_service


router = APIRouter(prefix="/teams", tags=["Teams"])


@router.get("/", response_model=list[TeamRead])
async def list_teams(db: AsyncSession = Depends(get_db)):
    return await team_service.list_teams(db)


@router.get("/{team_id}", response_model=TeamRead)
async def get_team(team_id: int, db: AsyncSession = Depends(get_db)):
    team = await team_service.get_team(db, team_id)
    if not team:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Team not found")
    return team


@router.post("/", response_model=TeamRead, status_code=status.HTTP_201_CREATED)
async def create_team(payload: TeamCreate, db: AsyncSession = Depends(get_db)):
    return await team_service.create_team(db, payload)


@router.put("/{team_id}", response_model=TeamRead)
async def update_team(team_id: int, payload: TeamUpdate, db: AsyncSession = Depends(get_db)):
    team = await team_service.update_team(db, team_id, payload)
    if not team:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Team not found")
    return team


@router.delete("/{team_id}", status_code=status.HTTP_204_NO_CONTENT)
async def delete_team(team_id: int, db: AsyncSession = Depends(get_db)):
    ok = await team_service.delete_team(db, team_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Team not found")
    return None








