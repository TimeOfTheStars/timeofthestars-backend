from sqlalchemy import Column, Integer, ForeignKey, UniqueConstraint
from sqlalchemy.orm import relationship
from app.db import Base

class ChampionshipTeams(Base):
    __tablename__ = "championship_teams"
    __table_args__ = (
        UniqueConstraint("championship_id", "team_id", name="uq_championship_team"),
    )

    id = Column(Integer, primary_key=True, index=True)
    championship_id = Column(Integer, ForeignKey("championships.id"))
    team_id = Column(Integer, ForeignKey("teams.id"))

    wins = Column(Integer, default=0)
    losses = Column(Integer, default=0)
    draws = Column(Integer, default=0)
    goals_scored = Column(Integer, default=0)
    goals_conceded = Column(Integer, default=0)
    games = Column(Integer, default=0)
    points = Column(Integer, default=0)
    extra_points = Column(Integer, default=0)

    championship = relationship("Championship", back_populates="championship_teams")
    team = relationship("Team", back_populates="championship_entries")