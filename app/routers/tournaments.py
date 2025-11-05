from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.connection import get_db
from app.schemas import (
    TournamentCreate,
    TournamentUpdate,
    TournamentRead,
    TournamentAddTeam,
    TournamentAddPlayer,
    TournamentAddGame,
    TournamentTeamWithStats,
    TournamentPlayerWithStats,
)
from app.schemas.game import GameRead
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


# Linking endpoints
@router.post("/{tournament_id}/teams", status_code=status.HTTP_204_NO_CONTENT)
async def add_team_to_tournament(
    tournament_id: int,
    payload: TournamentAddTeam,
    db: AsyncSession = Depends(get_db),
):
    await tournament_service.add_team(db, tournament_id, payload.team_id)
    return None


@router.delete("/{tournament_id}/teams/{team_id}", status_code=status.HTTP_204_NO_CONTENT)
async def remove_team_from_tournament(
    tournament_id: int,
    team_id: int,
    db: AsyncSession = Depends(get_db),
):
    ok = await tournament_service.remove_team(db, tournament_id, team_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Link not found")
    return None


@router.post("/{tournament_id}/players", status_code=status.HTTP_204_NO_CONTENT)
async def add_player_to_tournament(
    tournament_id: int,
    payload: TournamentAddPlayer,
    db: AsyncSession = Depends(get_db),
):
    await tournament_service.add_player(
        db,
        tournament_id,
        payload.team_id,
        payload.player_id,
        payload.number,
    )
    return None


@router.delete("/{tournament_id}/players/{player_id}", status_code=status.HTTP_204_NO_CONTENT)
async def remove_player_from_tournament(
    tournament_id: int,
    player_id: int,
    team_id: int,
    db: AsyncSession = Depends(get_db),
):
    ok = await tournament_service.remove_player(db, tournament_id, team_id, player_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Link not found")
    return None


@router.post("/{tournament_id}/games", status_code=status.HTTP_204_NO_CONTENT)
async def add_game_to_tournament(
    tournament_id: int,
    payload: TournamentAddGame,
    db: AsyncSession = Depends(get_db),
):
    await tournament_service.add_game(db, tournament_id, payload.game_id)
    return None


@router.delete("/{tournament_id}/games/{game_id}", status_code=status.HTTP_204_NO_CONTENT)
async def remove_game_from_tournament(
    tournament_id: int,
    game_id: int,
    db: AsyncSession = Depends(get_db),
):
    ok = await tournament_service.remove_game(db, tournament_id, game_id)
    if not ok:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Link not found")
    return None


# Get endpoints with statistics
@router.get("/{tournament_id}/teams", response_model=list[TournamentTeamWithStats])
async def get_tournament_teams(
    tournament_id: int,
    db: AsyncSession = Depends(get_db),
):
    """Получить список команд в турнире со статистикой"""
    teams = await tournament_service.get_tournament_teams(db, tournament_id)
    return [TournamentTeamWithStats.model_validate(team) for team in teams]


@router.get("/{tournament_id}/players", response_model=list[TournamentPlayerWithStats])
async def get_tournament_players(
    tournament_id: int,
    db: AsyncSession = Depends(get_db),
):
    """Получить список игроков в турнире со статистикой"""
    players = await tournament_service.get_tournament_players(db, tournament_id)
    return [TournamentPlayerWithStats.model_validate(player) for player in players]


@router.get("/{tournament_id}/games", response_model=list[GameRead])
async def get_tournament_games(
    tournament_id: int,
    db: AsyncSession = Depends(get_db),
):
    """Получить список игр в турнире"""
    games = await tournament_service.get_tournament_games(db, tournament_id)
    return games





