from .root import router as root_router
from .teams import router as teams_router
from .players import router as players_router
from .tournaments import router as tournaments_router
from .championships import router as championships_router
from .games import router as games_router

__all__ = [
    "root_router",
    "teams_router",
    "players_router",
    "tournaments_router",
    "championships_router",
    "games_router",
]
