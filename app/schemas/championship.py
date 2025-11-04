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


