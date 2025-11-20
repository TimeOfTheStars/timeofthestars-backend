import uvicorn
from fastapi import FastAPI
from fastapi.openapi.utils import get_openapi
from sqlalchemy import text
from sqlalchemy.ext.asyncio import create_async_engine
from starlette.middleware.sessions import SessionMiddleware
from fastapi.middleware.cors import CORSMiddleware
from app.routers import (
    root_router,
    teams_router,
    players_router,
    tournaments_router,
    championships_router,
    games_router,
)

from app.config import settings
from app.admin import setup_admin
# Импортируем модели для регистрации SQLAlchemy событий
from app.db.models import ChampionshipGames, TournamentGames  # noqa: F401

app = FastAPI(
    title="Time Of The Stars",
    description="""Хоккейная лига «TIME OF THE STARS»
    """,
    version="1.0.0",
    openapi_extra={
        "components": {
            "securitySchemes": {
                "BearerAuth": {"type": "http", "scheme": "bearer", "bearerFormat": "JWT"}
            }
        },
        "security": [{"BearerAuth": []}],
    },
)

# Добавляем middleware для сессий (если админ-панель включена)
# Важно: middleware должен быть добавлен ДО подключения роутеров
if settings.ADMIN_ENABLED:
    app.add_middleware(SessionMiddleware, secret_key=settings.SECRET_KEY)

# Подключаем роутеры
app.include_router(root_router)
app.include_router(teams_router)
app.include_router(players_router)
app.include_router(tournaments_router)
app.include_router(championships_router)
app.include_router(games_router)

# Подключаем админ-панель
if settings.ADMIN_ENABLED:
    try:
        setup_admin(app)
    except Exception as e:
        import logging
        logger = logging.getLogger(__name__)
        logger.warning(f"Не удалось инициализировать админ-панель: {e}. Продолжаем работу без админ-панели.")

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# --- Swagger с авторизацией ---
def custom_openapi():
    if app.openapi_schema:
        return app.openapi_schema
    openapi_schema = get_openapi(
        title=app.title,
        version=app.version,
        description=app.description,
        routes=app.routes,
    )

    # Добавляем схему безопасности
    if "components" not in openapi_schema:
        openapi_schema["components"] = {}

    openapi_schema["components"]["securitySchemes"] = {
        "BearerAuth": {
            "type": "http",
            "scheme": "bearer",
            "bearerFormat": "JWT",
            "description": "Введите JWT токен в формате: Bearer <token>",
        }
    }

    # Применяем безопасность ко всем путям, кроме публичных
    public_paths = {
        "/docs",
        "/redoc",
        "/openapi.json",
        "/favicon.ico",
        "/user/create",
        "/health",
        "/metrics",
        "/sentry-debug",
        "/admin",  # Админ-панель имеет свою систему авторизации
    }

    for path, path_item in openapi_schema.get("paths", {}).items():
        # Пропускаем публичные пути
        if any(path.startswith(public_path) for public_path in public_paths):
            continue

        for operation in path_item.values():
            if isinstance(operation, dict):
                operation["security"] = [{"BearerAuth": []}]

    # Добавляем глобальную схему безопасности
    openapi_schema["security"] = [{"BearerAuth": []}]

    # Принудительно обновляем схему
    app.openapi_schema = openapi_schema

    return openapi_schema


app.openapi = custom_openapi
# --- конец Swagger настройки ---


# Проверка подключения к БД при старте
@app.on_event("startup")
async def _ping_db_on_startup():
    from app.config import settings as _settings

    engine = create_async_engine(_settings.database_uri_async)
    async with engine.begin() as conn:
        await conn.execute(text("SELECT 1"))
    await engine.dispose()


if __name__ == "__main__":
    uvicorn.run(
        app,
        host=settings.APP_HOST,
        port=settings.APP_PORT,
        # reload=True,
        log_level="debug",
    )
