from sqlalchemy import Column, Integer, String
from sqlalchemy.orm import relationship
from app.db import Base

class Team(Base):
    __tablename__ = "teams"

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String, unique=True, nullable=False)
    slug = Column(String, unique=True, nullable=False)
    city = Column(String, nullable=True)
    players_count = Column(Integer, default=0)
    logo_url = Column(String, nullable=True)

    # Links to championship/tournament participation and players within them
    championship_entries = relationship("ChampionshipTeams", back_populates="team", cascade="all, delete-orphan")
    tournament_entries = relationship("TournamentTeams", back_populates="team", cascade="all, delete-orphan")

    championship_players = relationship("ChampionshipPlayers", back_populates="team", cascade="all, delete-orphan")
    tournament_players = relationship("TournamentPlayers", back_populates="team", cascade="all, delete-orphan")

    def __repr__(self):
        return f"({self.id}) {self.name}"