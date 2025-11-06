from datetime import date
from pydantic import BaseModel


class TournamentBase(BaseModel):
    name: str
    start_date: date
    end_date: date | None
    location: str | None
    logo_url: str | None


class TournamentCreate(TournamentBase):
    pass


class TournamentUpdate(BaseModel):
    name: str | None
    start_date: date | None
    end_date: date | None
    location: str | None
    logo_url: str | None


class TournamentRead(TournamentBase):
    id: int

    class Config:
        from_attributes = True


# Linking payloads
class TournamentAddTeam(BaseModel):
    team_id: int


class TournamentAddPlayer(BaseModel):
    team_id: int
    player_id: int
    number: int | None = None


class TournamentAddGame(BaseModel):
    game_id: int


# Response schemas with statistics
from app.schemas.team import TeamRead
from app.schemas.player import PlayerRead
from app.schemas.game import GameRead


class TournamentTeamStats(BaseModel):
    wins: int
    losses: int
    draws: int
    goals_scored: int
    goals_conceded: int
    games: int
    points: int
    extra_points: int

    class Config:
        from_attributes = True


class TournamentTeamWithStats(TeamRead):
    stats: TournamentTeamStats

    class Config:
        from_attributes = True


class TournamentPlayerStats(BaseModel):
    number: int | None
    matches: int
    goals: int
    assists: int
    penalties: int
    gaa: int | None

    class Config:
        from_attributes = True


class TournamentPlayerWithStats(PlayerRead):
    team_id: int
    team_name: str
    stats: TournamentPlayerStats

    class Config:
        from_attributes = True





