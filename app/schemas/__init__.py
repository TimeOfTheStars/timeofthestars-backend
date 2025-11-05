from .team import TeamCreate, TeamUpdate, TeamRead
from .player import PlayerCreate, PlayerUpdate, PlayerRead
from .tournament import (
    TournamentCreate,
    TournamentUpdate,
    TournamentRead,
    TournamentAddTeam,
    TournamentAddPlayer,
    TournamentAddGame,
    TournamentTeamWithStats,
    TournamentPlayerWithStats,
)
from .championship import (
    ChampionshipCreate,
    ChampionshipUpdate,
    ChampionshipRead,
    ChampionshipAddTeam,
    ChampionshipAddPlayer,
    ChampionshipAddGame,
    ChampionshipTeamWithStats,
    ChampionshipPlayerWithStats,
)
from .game import GameCreate, GameUpdate, GameRead


__all__ = [
    "TeamCreate",
    "TeamUpdate",
    "TeamRead",
    "PlayerCreate",
    "PlayerUpdate",
    "PlayerRead",
    "TournamentCreate",
    "TournamentUpdate",
    "TournamentRead",
    "TournamentAddTeam",
    "TournamentAddPlayer",
    "TournamentAddGame",
    "ChampionshipCreate",
    "ChampionshipUpdate",
    "ChampionshipRead",
    "ChampionshipAddTeam",
    "ChampionshipAddPlayer",
    "ChampionshipAddGame",
    "ChampionshipTeamWithStats",
    "ChampionshipPlayerWithStats",
    "GameCreate",
    "GameUpdate",
    "GameRead",
    "TournamentTeamWithStats",
    "TournamentPlayerWithStats",
]
