from datetime import date, time
from pydantic import BaseModel


class GameBase(BaseModel):
    team_a_id: int
    team_b_id: int
    score_team_a: int |  None
    score_team_b: int |  None
    date: date
    time: time
    location: str
    bullet_win_team: int |  None


class GameCreate(GameBase):
    pass


class GameUpdate(BaseModel):
    team_a_id: int |  None
    team_b_id: int |  None
    score_team_a: int |  None
    score_team_b: int |  None
    date: date |  None
    time: time |  None
    location: str |  None
    bullet_win_team: int |  None


class GameRead(GameBase):
    id: int

    class Config:
        from_attributes = True








