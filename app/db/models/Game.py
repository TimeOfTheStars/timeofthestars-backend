from sqlalchemy import Column, Integer, String, Date, ForeignKey, Time
from sqlalchemy.orm import relationship
from app.db import Base

class Game(Base):
    __tablename__ = "games"

    id = Column(Integer, primary_key=True, index=True)

    team_a_id = Column(Integer, ForeignKey("teams.id"), nullable=False)
    team_b_id = Column(Integer, ForeignKey("teams.id"), nullable=False)

    score_team_a = Column(Integer, nullable=True)
    score_team_b = Column(Integer, nullable=True)

    date = Column(Date, nullable=False)
    time = Column(Time, nullable=False)
    location = Column(String, nullable=False)
    scan = Column(String, nullable=True)
    video_url = Column(String, nullable=True)

    bullet_win_team = Column(Integer, ForeignKey("teams.id"), nullable=True)

    team_a = relationship("Team", foreign_keys=[team_a_id])
    team_b = relationship("Team", foreign_keys=[team_b_id])
    bullet_team = relationship("Team", foreign_keys=[bullet_win_team])

    # Links to tournaments/championships
    championship_links = relationship("ChampionshipGames", back_populates="game", cascade="all, delete-orphan")
    tournament_links = relationship("TournamentGames", back_populates="game", cascade="all, delete-orphan")

    def __repr__(self):
        return f"({self.id}) {self.team_a_id} vs {self.team_b_id}"