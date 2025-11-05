from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import GameCreate, GameUpdate, GameRead
from app.services import game_service


router = APIRouter(prefix="/games", tags=["Games"])


@router.get("/", response_model=list[GameRead])
async def list_games(db: AsyncSession = Depends(get_db)):
    return await game_service.list_games(db)


@router.get("/{game_id}", response_model=GameRead)
async def get_game(game_id: int, db: AsyncSession = Depends(get_db)):
    item = await game_service.get_game(db, game_id)
    if not item:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Game not found")
    return item


@router.post("/", response_model=GameRead, status_code=status.HTTP_201_CREATED)
async def create_game(payload: GameCreate, db: AsyncSession = Depends(get_db)):
    return await game_service.create_game(db, payload)


@router.put("/{game_id}", response_model=GameRead)
async def update_game(game_id: int, payload: GameUpdate, db: AsyncSession = Depends(get_db)):
    item = await game_service.update_game(db, game_id, payload)
    if not item:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Game not found")
    return item


@router.delete("/{game_id}", status_code=status.HTTP_204_NO_CONTENT)
async def delete_game(game_id: int, db: AsyncSession = Depends(get_db)):
    ok = await game_service.delete_game(db, game_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Game not found")
    return None






