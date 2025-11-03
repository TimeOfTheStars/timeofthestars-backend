from sqlalchemy import Column, Integer, ForeignKey
from app.db import Base

class ChampionshipGames(Base):
    __tablename__ = "championship_games"

    id = Column(Integer, primary_key=True, index=True)
    championship_id = Column(Integer, ForeignKey("championships.id"))
    game_id = Column(Integer, ForeignKey("games.id"))