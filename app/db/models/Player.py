from sqlalchemy import Column, Integer, String, Date
from app.db import Base

class Player(Base):
    __tablename__ = "players"

    id = Column(Integer, primary_key=True, index=True)
    full_name = Column(String, nullable=False)
    birth_date = Column(Date, nullable=True)
    position = Column(String, nullable=True)
    grip = Column(String, nullable=True)
    photo_url = Column(String, nullable=True)