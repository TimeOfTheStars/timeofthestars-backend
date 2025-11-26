from sqlalchemy import Column, Integer, String, Boolean, event
from app.db import Base
from app.utils.password import pwd_context


class AdminUser(Base):
    __tablename__ = "admin_users"

    id = Column(Integer, primary_key=True, index=True)
    username = Column(String, unique=True, nullable=False, index=True)
    hashed_password = Column(String, nullable=False)
    is_active = Column(Boolean, default=True, nullable=False)
    role = Column(String, nullable=False, default="admin")  # "admin" | "manager"

    def __repr__(self):
        return f"AdminUser(id={self.id}, username={self.username})"


@event.listens_for(AdminUser, "before_insert")
def hash_password_on_insert(mapper, connection, target):
    """Автоматически хеширует пароль при создании, если он не является хешем"""
    if target.hashed_password and not target.hashed_password.startswith("$2b$"):
        target.hashed_password = pwd_context.hash(target.hashed_password)


@event.listens_for(AdminUser, "before_update")
def hash_password_on_update(mapper, connection, target):
    """Автоматически хеширует пароль при обновлении, если он изменен и не является хешем"""
    # Получаем текущее состояние объекта из базы
    if target.hashed_password:
        # Если пароль не пустой и не является хешем - хешируем его
        if not target.hashed_password.startswith("$2b$"):
            target.hashed_password = pwd_context.hash(target.hashed_password)
    # Если пароль пустой при обновлении - не трогаем его (оставляем старый)
    # Это обрабатывается на уровне SQLAlchemy - пустые значения не обновляются

