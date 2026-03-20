from datetime import date, time
from enum import Enum

from pydantic import BaseModel, field_validator


class GamePlayoffStage(str, Enum):
    matches = "matches"
    quarterfinal = "quarterfinal"
    semifinal = "semifinal"
    final = "final"


_PLAYOFF_STAGE_ALIASES: dict[str, str] = {
    # Backward compatibility (old Russian values)
    "1/4 финала": "quarterfinal",
    "1/2 финала": "semifinal",
    "финал": "final",
}


class GameBase(BaseModel):
    team_a_id: int
    team_b_id: int
    score_team_a: int | None
    score_team_b: int | None
    date: date
    time: time
    location: str
    scan: str | None
    video_url: str | None
    bullet_win_team: int | None
    # "matches" участвует в подсчёте таблицы, остальные значения используются для плей-офф
    playoff_stage: GamePlayoffStage = GamePlayoffStage.matches

    @field_validator("playoff_stage", mode="before")
    @classmethod
    def _normalize_playoff_stage(cls, v):
        if v is None:
            return None
        if isinstance(v, GamePlayoffStage):
            return v
        if isinstance(v, str):
            v = v.strip()
        return _PLAYOFF_STAGE_ALIASES.get(v, v)


class GameCreate(GameBase):
    pass


class GameUpdate(BaseModel):
    team_a_id: int | None
    team_b_id: int | None
    score_team_a: int | None
    score_team_b: int | None
    date: date | None
    time: time | None
    location: str | None
    scan: str | None
    video_url: str | None
    bullet_win_team: int | None
    playoff_stage: GamePlayoffStage | None = None

    @field_validator("playoff_stage", mode="before")
    @classmethod
    def _normalize_playoff_stage(cls, v):
        if v is None:
            return None
        if isinstance(v, GamePlayoffStage):
            return v
        if isinstance(v, str):
            v = v.strip()
        return _PLAYOFF_STAGE_ALIASES.get(v, v)


class GameRead(GameBase):
    id: int

    class Config:
        from_attributes = True



