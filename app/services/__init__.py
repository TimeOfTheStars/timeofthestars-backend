from .team_service import (
    list_teams,
    get_team,
    create_team,
    update_team,
    delete_team,
)
from .player_service import (
    list_players,
    get_player,
    create_player,
    update_player,
    delete_player,
)
from .tournament_service import (
    list_tournaments,
    get_tournament,
    create_tournament,
    update_tournament,
    delete_tournament,
)
from .championship_service import (
    list_championships,
    get_championship,
    create_championship,
    update_championship,
    delete_championship,
)
from .game_service import (
    list_games,
    get_game,
    create_game,
    update_game,
    delete_game,
)

__all__ = [
    # teams
    "list_teams",
    "get_team",
    "create_team",
    "update_team",
    "delete_team",
    # players
    "list_players",
    "get_player",
    "create_player",
    "update_player",
    "delete_player",
    # tournaments
    "list_tournaments",
    "get_tournament",
    "create_tournament",
    "update_tournament",
    "delete_tournament",
    # championships
    "list_championships",
    "get_championship",
    "create_championship",
    "update_championship",
    "delete_championship",
    # games
    "list_games",
    "get_game",
    "create_game",
    "update_game",
    "delete_game",
]





