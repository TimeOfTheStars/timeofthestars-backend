from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import PlayerCreate, PlayerUpdate, PlayerRead
from app.services import player_service


router = APIRouter(prefix="/players", tags=["Players"])


@router.get("/", response_model=list[PlayerRead])
async def list_players(db: AsyncSession = Depends(get_db)):
    return await player_service.list_players(db)


@router.get("/{player_id}", response_model=PlayerRead)
async def get_player(player_id: int, db: AsyncSession = Depends(get_db)):
    player = await player_service.get_player(db, player_id)
    if not player:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Player not found")
    return player


@router.post("/", response_model=PlayerRead, status_code=status.HTTP_201_CREATED)
async def create_player(payload: PlayerCreate, db: AsyncSession = Depends(get_db)):
    return await player_service.create_player(db, payload)


@router.put("/{player_id}", response_model=PlayerRead)
async def update_player(player_id: int, payload: PlayerUpdate, db: AsyncSession = Depends(get_db)):
    player = await player_service.update_player(db, player_id, payload)
    if not player:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Player not found")
    return player


@router.delete("/{player_id}", status_code=status.HTTP_204_NO_CONTENT)
async def delete_player(player_id: int, db: AsyncSession = Depends(get_db)):
    ok = await player_service.delete_player(db, player_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Player not found")
    return None


