import os

from pydantic import AliasChoices, ConfigDict, Field
from pydantic_settings import BaseSettings


class Settings(BaseSettings):
    APP_HOST: str = "0.0.0.0"
    APP_PORT: int = 8002

    # Переменные подключения к БД. Поддерживаем как DB_*, так и POSTGRESQL_*
    DB_NAME: str = Field(
        default="user_service_db",
        validation_alias=AliasChoices("DB_NAME", "POSTGRESQL_DATABASE"),
    )
    DB_USER: str = Field(
        default="postgres",
        validation_alias=AliasChoices("DB_USER", "POSTGRESQL_USERNAME"),
    )
    DB_PASSWORD: str = Field(
        default="postgres",
        validation_alias=AliasChoices("DB_PASSWORD", "POSTGRESQL_PASSWORD"),
    )
    DB_HOST: str = Field(
        default="user_service_db",
        validation_alias=AliasChoices("DB_HOST", "POSTGRESQL_HOST"),
    )
    DB_PORT: str = Field(
        default="5433",
        validation_alias=AliasChoices("DB_PORT", "POSTGRESQL_PORT"),
    )
    # Полный URL может переопределить раздельные параметры
    DATABASE_URL: str | None = Field(default=None)
    
    # Секретный ключ для сессий (для админ-панели)
    SECRET_KEY: str = Field(default="change-this-secret-key-in-production")
    
    # Включить/выключить админ-панель
    ADMIN_ENABLED: bool = Field(default=True)

    @property
    def database_settings(self) -> dict:
        return {
            "database": self.DB_NAME,
            "user": self.DB_USER,
            "password": self.DB_PASSWORD,
            "host": self.DB_HOST,
            "port": self.DB_PORT,
        }

    @property
    def database_uri_async(self) -> str:
        # Если указан полный URL, убеждаемся что используется async-драйвер
        if self.DATABASE_URL:
            url = self.DATABASE_URL
            if url.startswith("postgresql://"):
                url = url.replace("postgresql://", "postgresql+asyncpg://", 1)
            return url
        return "postgresql+asyncpg://{user}:{password}@{host}:{port}/{database}".format(
            **self.database_settings,
        )

    model_config = ConfigDict(env_file="./.env", extra="ignore")


settings = Settings()
