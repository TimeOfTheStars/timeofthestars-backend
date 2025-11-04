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


