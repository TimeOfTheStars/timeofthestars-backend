from sqlalchemy import Column, Integer, String, Date, ForeignKey, Time
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

    bullet_win_team = Column(Integer, ForeignKey("teams.id"), nullable=True)