from datetime import date
from pydantic import BaseModel


class ChampionshipBase(BaseModel):
    name: str
    start_date: date
    end_date: date | None
    location: str | None
    logo_url: str | None


class ChampionshipCreate(ChampionshipBase):
    pass


class ChampionshipUpdate(BaseModel):
    name: str | None
    start_date: date | None
    end_date: date | None
    location: str | None
    logo_url: str | None


class ChampionshipRead(ChampionshipBase):
    id: int

    class Config:
        from_attributes = True


# Linking payloads
class ChampionshipAddTeam(BaseModel):
    team_id: int


class ChampionshipAddPlayer(BaseModel):
    team_id: int
    player_id: int
    number: int | None = None


class ChampionshipAddGame(BaseModel):
    game_id: int


# Response schemas with statistics
from app.schemas.team import TeamRead
from app.schemas.player import PlayerRead
from app.schemas.game import GameRead


class ChampionshipTeamStats(BaseModel):
    wins: int
    losses: int
    draws: int
    goals_scored: int
    goals_conceded: int
    games: int
    extra_points: int

    class Config:
        from_attributes = True


class ChampionshipTeamWithStats(TeamRead):
    stats: ChampionshipTeamStats

    class Config:
        from_attributes = True


class ChampionshipPlayerStats(BaseModel):
    number: int | None
    matches: int
    goals: int
    assists: int
    penalties: int
    gaa: int | None

    class Config:
        from_attributes = True


class ChampionshipPlayerWithStats(PlayerRead):
    team_id: int
    team_name: str
    stats: ChampionshipPlayerStats

    class Config:
        from_attributes = True





