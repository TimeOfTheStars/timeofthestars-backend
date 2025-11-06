import asyncio
from sqlalchemy import Column, Integer, ForeignKey, UniqueConstraint, event
from sqlalchemy.orm import relationship, Session
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


# Хранилище для задач, которые нужно выполнить после коммита
# Используем thread-local storage для безопасности при параллельных транзакциях
import threading
_thread_local = threading.local()


def _get_pending_tasks():
    """Получает список задач для текущего потока"""
    if not hasattr(_thread_local, 'tasks'):
        _thread_local.tasks = []
    return _thread_local.tasks


def _handle_championship_game_after_flush(session: Session, flush_context):
    """Обработчик события после flush (перед коммитом)"""
    # Сохраняем информацию о добавленных и удаленных объектах ChampionshipGames
    pending_tasks = _get_pending_tasks()
    for obj in session.new:
        if isinstance(obj, ChampionshipGames):
            pending_tasks.append(('insert', obj.championship_id, obj.game_id))
    
    for obj in session.deleted:
        if isinstance(obj, ChampionshipGames):
            pending_tasks.append(('delete', obj.championship_id, obj.game_id))


def _handle_championship_game_after_commit(session: Session):
    """Обработчик события после коммита транзакции"""
    # Обрабатываем все накопленные задачи
    pending_tasks = _get_pending_tasks()
    tasks_to_process = pending_tasks.copy()
    pending_tasks.clear()
    
    for task_type, championship_id, game_id in tasks_to_process:
        if task_type == 'insert':
            _schedule_async_task(_async_handle_championship_game_insert, championship_id, game_id)
        elif task_type == 'delete':
            _schedule_async_task(_async_handle_championship_game_delete, championship_id, game_id)


def _schedule_async_task(coro, *args):
    """Планирует выполнение асинхронной задачи"""
    try:
        loop = asyncio.get_event_loop()
        if loop.is_running():
            # Если цикл уже запущен, создаем задачу
            asyncio.create_task(coro(*args))
        else:
            # Если цикл не запущен, запускаем его
            loop.run_until_complete(coro(*args))
    except RuntimeError:
        # Если нет event loop, создаем новый
        loop = asyncio.new_event_loop()
        asyncio.set_event_loop(loop)
        loop.run_until_complete(coro(*args))
        loop.close()


async def _async_handle_championship_game_insert(championship_id: int, game_id: int):
    """Асинхронная обработка добавления игры в чемпионат"""
    from app.db.base import session_maker
    from app.services import championship_service
    
    async with session_maker() as session:
        try:
            await championship_service.ensure_teams_in_championship(session, championship_id, game_id)
            await championship_service.recalculate_championship_teams_stats(session, championship_id, game_id)
            await session.commit()
        except Exception as e:
            await session.rollback()
            import logging
            logger = logging.getLogger(__name__)
            logger.error(f"Ошибка при обработке добавления игры в чемпионат: {e}")


async def _async_handle_championship_game_delete(championship_id: int, game_id: int):
    """Асинхронная обработка удаления игры из чемпионата"""
    from app.db.base import session_maker
    from app.services import championship_service
    
    async with session_maker() as session:
        try:
            await championship_service.recalculate_championship_teams_stats(session, championship_id, None)
            await session.commit()
        except Exception as e:
            await session.rollback()
            import logging
            logger = logging.getLogger(__name__)
            logger.error(f"Ошибка при обработке удаления игры из чемпионата: {e}")


# Регистрируем события
event.listen(Session, 'after_flush', _handle_championship_game_after_flush)
event.listen(Session, 'after_commit', _handle_championship_game_after_commit)