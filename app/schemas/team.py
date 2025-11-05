from pydantic import BaseModel


class TeamBase(BaseModel):
    name: str
    slug: str
    city: str | None
    players_count: int | None
    logo_url: str | None


class TeamCreate(TeamBase):
    pass


class TeamUpdate(BaseModel):
    name: str | None
    slug: str | None
    city: str | None
    players_count: int | None
    logo_url: str | None


class TeamRead(TeamBase):
    id: int

    class Config:
        from_attributes = True






