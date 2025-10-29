from contextvars import ContextVar

from sqlalchemy.ext.asyncio import AsyncSession, async_sessionmaker, create_async_engine
from sqlalchemy.orm import sessionmaker

from app.config import settings
from app.db.base import container

db_session: ContextVar[AsyncSession | None] = ContextVar("db_session", default=None)
session_maker = container.resolve(sessionmaker)


async def get_db():
    if db_session.get() is None:
        async with session_maker() as session:
            db_session.set(session)
            yield session
            await session.commit()
            await session.close()
    else:
        yield db_session.get()


class Transaction:
    async def __aenter__(self) -> None:
        session_maker = container.resolve(sessionmaker)
        self.session: AsyncSession = session_maker()
        self.token = db_session.set(self.session)

    async def __aexit__(self, exception_type, exception, traceback) -> None:
        if exception:
            await self.session.rollback()
        else:
            await self.session.commit()
        await self.session.close()
        db_session.reset(self.token)


DATABASE_URL = settings.database_uri_async
engine = create_async_engine(DATABASE_URL)
async_session_maker = async_sessionmaker(engine, expire_on_commit=False)
