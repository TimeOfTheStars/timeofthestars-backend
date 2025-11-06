from sqlalchemy import Column, Integer, ForeignKey, UniqueConstraint
from sqlalchemy.orm import relationship
from app.db import Base

class TournamentGames(Base):
    __tablename__ = "tournament_games"
    __table_args__ = (
        UniqueConstraint("tournament_id", "game_id", name="uq_tournament_game"),
    )

    id = Column(Integer, primary_key=True, index=True)
    tournament_id = Column(Integer, ForeignKey("tournaments.id"))
    game_id = Column(Integer, ForeignKey("games.id"))

    tournament = relationship("Tournament", back_populates="tournament_games")
    game = relationship("Game", back_populates="tournament_links")

    def __repr__(self):
        return f"{self.id}"