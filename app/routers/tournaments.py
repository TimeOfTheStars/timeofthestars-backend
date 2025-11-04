from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import TournamentCreate, TournamentUpdate, TournamentRead
from app.services import tournament_service


router = APIRouter(prefix="/tournaments", tags=["Tournaments"])


@router.get("/", response_model=list[TournamentRead])
async def list_tournaments(db: AsyncSession = Depends(get_db)):
    return await tournament_service.list_tournaments(db)


@router.get("/{tournament_id}", response_model=TournamentRead)
async def get_tournament(tournament_id: int, db: AsyncSession = Depends(get_db)):
    item = await tournament_service.get_tournament(db, tournament_id)
    if not item:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Tournament not found")
    return item


@router.post("/", response_model=TournamentRead, status_code=status.HTTP_201_CREATED)
async def create_tournament(payload: TournamentCreate, db: AsyncSession = Depends(get_db)):
    return await tournament_service.create_tournament(db, payload)


@router.put("/{tournament_id}", response_model=TournamentRead)
async def update_tournament(tournament_id: int, payload: TournamentUpdate, db: AsyncSession = Depends(get_db)):
    item = await tournament_service.update_tournament(db, tournament_id, payload)
    if not item:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Tournament not found")
    return item


@router.delete("/{tournament_id}", status_code=status.HTTP_204_NO_CONTENT)
async def delete_tournament(tournament_id: int, db: AsyncSession = Depends(get_db)):
    ok = await tournament_service.delete_tournament(db, tournament_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Tournament not found")
    return None


