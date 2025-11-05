from datetime import date
from pydantic import BaseModel


class PlayerBase(BaseModel):
    full_name: str
    birth_date: date | None
    position: str | None
    grip: str | None
    photo_url: str | None


class PlayerCreate(PlayerBase):
    pass


class PlayerUpdate(BaseModel):
    full_name: str | None
    birth_date: date | None
    position: str | None
    grip: str | None
    photo_url: str | None


class PlayerRead(PlayerBase):
    id: int

    class Config:
        from_attributes = True






