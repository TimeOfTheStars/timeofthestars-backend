from sqlalchemy import Column, Integer, String, Date
from sqlalchemy.orm import relationship
from app.db import Base

class Championship(Base):
    __tablename__ = "championships"

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String, nullable=False)
    start_date = Column(Date, nullable=False)
    end_date = Column(Date, nullable=True)
    location = Column(String, nullable=True)
    logo_url = Column(String, nullable=True)

    # Association object collections
    championship_teams = relationship("ChampionshipTeams", back_populates="championship", cascade="all, delete-orphan")
    championship_players = relationship("ChampionshipPlayers", back_populates="championship", cascade="all, delete-orphan")
    championship_games = relationship("ChampionshipGames", back_populates="championship", cascade="all, delete-orphan")

    # Convenience view-only collections to access related entities directly
    teams = relationship("Team", secondary="championship_teams", viewonly=True)
    players = relationship("Player", secondary="championship_players", viewonly=True)
    games = relationship("Game", secondary="championship_games", viewonly=True)

    def __repr__(self):
        return f"({self.id}) {self.name}"