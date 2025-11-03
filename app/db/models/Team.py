from sqlalchemy import Column, Integer, String
from app.db import Base

class Team(Base):
    __tablename__ = "teams"

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String, unique=True, nullable=False)
    slug = Column(String, unique=True, nullable=False)
    city = Column(String, nullable=True)
    players_count = Column(Integer, default=0)
    logo_url = Column(String, nullable=True)