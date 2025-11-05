from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import (
    ChampionshipCreate,
    ChampionshipUpdate,
    ChampionshipRead,
    ChampionshipAddTeam,
    ChampionshipAddPlayer,
    ChampionshipAddGame,
    ChampionshipTeamWithStats,
    ChampionshipPlayerWithStats,
)
from app.schemas.game import GameRead
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


# Linking endpoints
@router.post("/{championship_id}/teams", status_code=status.HTTP_204_NO_CONTENT)
async def add_team_to_championship(
    championship_id: int,
    payload: ChampionshipAddTeam,
    db: AsyncSession = Depends(get_db),
):
    await championship_service.add_team(db, championship_id, payload.team_id)
    return None


@router.delete("/{championship_id}/teams/{team_id}", status_code=status.HTTP_204_NO_CONTENT)
async def remove_team_from_championship(
    championship_id: int,
    team_id: int,
    db: AsyncSession = Depends(get_db),
):
    ok = await championship_service.remove_team(db, championship_id, team_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Link not found")
    return None


@router.post("/{championship_id}/players", status_code=status.HTTP_204_NO_CONTENT)
async def add_player_to_championship(
    championship_id: int,
    payload: ChampionshipAddPlayer,
    db: AsyncSession = Depends(get_db),
):
    await championship_service.add_player(
        db,
        championship_id,
        payload.team_id,
        payload.player_id,
        payload.number,
    )
    return None


@router.delete("/{championship_id}/players/{player_id}", status_code=status.HTTP_204_NO_CONTENT)
async def remove_player_from_championship(
    championship_id: int,
    player_id: int,
    team_id: int,
    db: AsyncSession = Depends(get_db),
):
    ok = await championship_service.remove_player(db, championship_id, team_id, player_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Link not found")
    return None


@router.post("/{championship_id}/games", status_code=status.HTTP_204_NO_CONTENT)
async def add_game_to_championship(
    championship_id: int,
    payload: ChampionshipAddGame,
    db: AsyncSession = Depends(get_db),
):
    await championship_service.add_game(db, championship_id, payload.game_id)
    return None


@router.delete("/{championship_id}/games/{game_id}", status_code=status.HTTP_204_NO_CONTENT)
async def remove_game_from_championship(
    championship_id: int,
    game_id: int,
    db: AsyncSession = Depends(get_db),
):
    ok = await championship_service.remove_game(db, championship_id, game_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Link not found")
    return None


# Get endpoints with statistics
@router.get("/{championship_id}/teams", response_model=list[ChampionshipTeamWithStats])
async def get_championship_teams(
    championship_id: int,
    db: AsyncSession = Depends(get_db),
):
    """Получить список команд в чемпионате со статистикой"""
    teams = await championship_service.get_championship_teams(db, championship_id)
    return [ChampionshipTeamWithStats.model_validate(team) for team in teams]


@router.get("/{championship_id}/players", response_model=list[ChampionshipPlayerWithStats])
async def get_championship_players(
    championship_id: int,
    db: AsyncSession = Depends(get_db),
):
    """Получить список игроков в чемпионате со статистикой"""
    players = await championship_service.get_championship_players(db, championship_id)
    return [ChampionshipPlayerWithStats.model_validate(player) for player in players]


@router.get("/{championship_id}/games", response_model=list[GameRead])
async def get_championship_games(
    championship_id: int,
    db: AsyncSession = Depends(get_db),
):
    """Получить список игр в чемпионате"""
    games = await championship_service.get_championship_games(db, championship_id)
    return games


