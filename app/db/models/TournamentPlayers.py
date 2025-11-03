from sqlalchemy import Column, Integer, ForeignKey
from app.db import Base

class TournamentPlayers(Base):
    __tablename__ = "tournament_players"

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