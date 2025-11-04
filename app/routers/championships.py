from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import ChampionshipCreate, ChampionshipUpdate, ChampionshipRead
from app.services import championship_service


router = APIRouter(prefix="/championships", tags=["Championships"])


@router.get("/", response_model=list[ChampionshipRead])
async def list_championships(db: AsyncSession = Depends(get_db)):
    return await championship_service.list_championships(db)


@router.get("/{championship_id}", response_model=ChampionshipRead)
async def get_championship(championship_id: int, db: AsyncSession = Depends(get_db)):
    item = await championship_service.get_championship(db, championship_id)
    if not item:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Championship not found")
    return item


@router.post("/", response_model=ChampionshipRead, status_code=status.HTTP_201_CREATED)
async def create_championship(payload: ChampionshipCreate, db: AsyncSession = Depends(get_db)):
    return await championship_service.create_championship(db, payload)


@router.put("/{championship_id}", response_model=ChampionshipRead)
async def update_championship(championship_id: int, payload: ChampionshipUpdate, db: AsyncSession = Depends(get_db)):
    item = await championship_service.update_championship(db, championship_id, payload)
    if not item:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Championship not found")
    return item


@router.delete("/{championship_id}", status_code=status.HTTP_204_NO_CONTENT)
async def delete_championship(championship_id: int, db: AsyncSession = Depends(get_db)):
    ok = await championship_service.delete_championship(db, championship_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Championship not found")
    return None


