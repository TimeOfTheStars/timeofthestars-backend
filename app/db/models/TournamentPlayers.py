from sqlalchemy import Column, Integer, ForeignKey, UniqueConstraint
from sqlalchemy.orm import relationship
from app.db import Base

class TournamentPlayers(Base):
    __tablename__ = "tournament_players"
    __table_args__ = (
        UniqueConstraint("tournament_id", "team_id", "player_id", name="uq_tournament_team_player"),
    )

    id = Column(Integer, primary_key=True, index=True)
    tournament_id = Column(Integer, ForeignKey("tournaments.id"))
    team_id = Column(Integer, ForeignKey("teams.id"))
    player_id = Column(Integer, ForeignKey("players.id"))

    number = Column(Integer, nullable=True, default=None)
    matches = Column(Integer, default=0)
    goals = Column(Integer, default=0)
    assists = Column(Integer, default=0)
    penalties = Column(Integer, default=0)
    gaa = Column(Integer, nullable=True, default=None)

    tournament = relationship("Tournament", back_populates="tournament_players")
    team = relationship("Team", back_populates="tournament_players")
    player = relationship("Player", back_populates="tournament_entries")