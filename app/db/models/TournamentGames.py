from sqlalchemy import Column, Integer, ForeignKey
from app.db import Base

class TournamentGames(Base):
    __tablename__ = "tournament_games"

    id = Column(Integer, primary_key=True, index=True)
    tournament_id = Column(Integer, ForeignKey("tournaments.id"))
    game_id = Column(Integer, ForeignKey("games.id"))