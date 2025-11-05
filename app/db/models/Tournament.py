from sqlalchemy import Column, Integer, String, Date
from sqlalchemy.orm import relationship
from app.db import Base

class Tournament(Base):
    __tablename__ = "tournaments"

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String, nullable=False)
    start_date = Column(Date, nullable=False)
    end_date = Column(Date, nullable=True)
    location = Column(String, nullable=True)
    logo_url = Column(String, nullable=True)

    # Association object collections
    tournament_teams = relationship("TournamentTeams", back_populates="tournament", cascade="all, delete-orphan")
    tournament_players = relationship("TournamentPlayers", back_populates="tournament", cascade="all, delete-orphan")
    tournament_games = relationship("TournamentGames", back_populates="tournament", cascade="all, delete-orphan")

    # Convenience view-only collections to access related entities directly
    teams = relationship("Team", secondary="tournament_teams", viewonly=True)
    players = relationship("Player", secondary="tournament_players", viewonly=True)
    games = relationship("Game", secondary="tournament_games", viewonly=True)