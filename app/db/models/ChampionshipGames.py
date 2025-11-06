from sqlalchemy import Column, Integer, ForeignKey, UniqueConstraint
from sqlalchemy.orm import relationship
from app.db import Base

class ChampionshipGames(Base):
    __tablename__ = "championship_games"
    __table_args__ = (
        UniqueConstraint("championship_id", "game_id", name="uq_championship_game"),
    )

    id = Column(Integer, primary_key=True, index=True)
    championship_id = Column(Integer, ForeignKey("championships.id"))
    game_id = Column(Integer, ForeignKey("games.id"))

    championship = relationship("Championship", back_populates="championship_games")
    game = relationship("Game", back_populates="championship_links")

    def __repr__(self):
        return f"{self.id}"