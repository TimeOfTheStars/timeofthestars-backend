from sqladmin import Admin, ModelView
from sqladmin.authentication import AuthenticationBackend
from fastapi import Request

from app.db.base import engine
from app.config import settings
from app.db.models import (
    Team,
    Player,
    Game,
    Championship,
    Tournament,
    ChampionshipTeams,
    ChampionshipPlayers,
    ChampionshipGames,
    TournamentTeams,
    TournamentPlayers,
    TournamentGames,
)

class LinkView(ModelView):
    category = "Связующие таблицы"
    can_create = False
    can_edit = False
    can_delete = False

class AdminAuth(AuthenticationBackend):
    """
    Простая аутентификация для админ-панели.
    В продакшене нужно использовать полноценную систему авторизации.
    """
    async def login(self, request: Request) -> bool:
        form = await request.form()
        username = form.get("username")
        password = form.get("password")
        
        # TODO: Заменить на реальную проверку через БД или JWT
        # Для разработки используем простую проверку
        if username == "admin" and password == "admin":
            request.session.update({"authenticated": True})
            return True
        return False

    async def logout(self, request: Request) -> bool:
        request.session.clear()
        return True

    async def authenticate(self, request: Request) -> bool:
        return request.session.get("authenticated", False)


authentication_backend = AdminAuth(secret_key=settings.SECRET_KEY)


class TeamAdmin(ModelView, model=Team):
    name = "Команда"
    name_plural = "Команды"
    icon = "fa-solid fa-people-group"
    
    column_list = [Team.id, Team.name, Team.city, Team.players_count]
    column_searchable_list = [Team.name, Team.city]
    form_columns = [Team.name, Team.slug, Team.city, Team.players_count, Team.logo_url]
    column_labels = {
        Team.id: "ID",
        Team.name: "Название",
        Team.city: "Город",
        Team.players_count: "Количество игроков"
    }

class PlayerAdmin(ModelView, model=Player):
    name = "Игрок"
    name_plural = "Игроки"
    icon = "fa-solid fa-user"
    
    column_list = [Player.id, Player.full_name, Player.position, Player.birth_date]
    column_searchable_list = [Player.full_name, Player.position]
    column_sortable_list = [Player.id, Player.full_name, Player.birth_date]
    form_columns = [Player.full_name, Player.birth_date, Player.position, Player.grip, Player.photo_url]
    column_labels = {
        Player.id: "ID",
        Player.full_name: "ФИО",
        Player.position: "Позиция",
        Player.birth_date: "День рождения"
    }

class GameAdmin(ModelView, model=Game):
    name = "Игра"
    name_plural = "Игры"
    icon = "fa-solid fa-gamepad"
    
    column_list = [
        Game.id,
        Game.team_a_id,
        Game.team_b_id,
        Game.score_team_a,
        Game.score_team_b,
        Game.date,
        Game.time,
        Game.location,
    ]
    column_searchable_list = [Game.date, Game.team_a_id, Game.team_b_id, Game.location,]
    column_sortable_list = [Game.id, Game.date, Game.time]
    form_columns = [
        Game.team_a_id,
        Game.team_b_id,
        Game.score_team_a,
        Game.score_team_b,
        Game.date,
        Game.time,
        Game.location,
        Game.bullet_win_team,
    ]
    column_labels = {
        Game.id: "ID",
        Game.team_a_id: "ID Команды А",
        Game.team_b_id: "ID Команды B",
        Game.score_team_a: "Счёт команды А",
        Game.score_team_b: "Счёт команды B",
        Game.date: "Дата игры",
        Game.time: "Время игры",
        Game.location: "Локация",
    }

class ChampionshipAdmin(ModelView, model=Championship):
    name = "Чемпионат"
    name_plural = "Чемпионаты"
    icon = "fa-solid fa-trophy"
    
    column_list = [
        Championship.id,
        Championship.name,
        Championship.start_date,
        Championship.end_date,
        Championship.location,
    ]
    column_searchable_list = [Championship.name, Championship.location]
    column_sortable_list = [Championship.id, Championship.name, Championship.start_date]
    form_columns = [
        Championship.name,
        Championship.start_date,
        Championship.end_date,
        Championship.location,
        Championship.logo_url,
    ]
    column_labels = {
        Championship.id: "ID",
        Championship.name: "Название",
        Championship.start_date: "Начало",
        Championship.end_date: "Конец",
        Championship.location: "Локация(и)",
    }

class TournamentAdmin(ModelView, model=Tournament):
    name = "Турнир"
    name_plural = "Турниры"
    icon = "fa-solid fa-medal"
    
    column_list = [
        Tournament.id,
        Tournament.name,
        Tournament.start_date,
        Tournament.end_date,
        Tournament.location,
    ]
    column_searchable_list = [Tournament.name, Tournament.location]
    column_sortable_list = [Tournament.id, Tournament.name, Tournament.start_date]
    form_columns = [
        Tournament.name,
        Tournament.start_date,
        Tournament.end_date,
        Tournament.location,
        Tournament.logo_url,
    ]
    column_labels = {
        Tournament.id: "ID",
        Tournament.name: "Название",
        Tournament.start_date: "Начало",
        Tournament.end_date: "Конец",
        Tournament.location: "Локация(и)",
    }

class ChampionshipPlayersAdmin(ModelView, model=ChampionshipPlayers):
    name = "Игрок в чемпионате"
    name_plural = "Игроки в чемпионатах"
    icon = "fa-solid fa-link"

    column_list = [
        ChampionshipPlayers.id,
        ChampionshipPlayers.championship_id,
        ChampionshipPlayers.team_id,
        ChampionshipPlayers.player_id,
        ChampionshipPlayers.number,
        ChampionshipPlayers.matches,
        ChampionshipPlayers.goals,
        ChampionshipPlayers.assists,
        ChampionshipPlayers.penalties,
    ]
    column_searchable_list = [ChampionshipPlayers.player_id, ChampionshipPlayers.team_id]
    column_sortable_list = [
        ChampionshipPlayers.id,
        ChampionshipPlayers.championship_id,
        ChampionshipPlayers.goals,
        ChampionshipPlayers.matches,
    ]
    form_columns = [
        ChampionshipPlayers.championship_id,
        ChampionshipPlayers.team_id,
        ChampionshipPlayers.player_id,
        ChampionshipPlayers.number,
        ChampionshipPlayers.matches,
        ChampionshipPlayers.goals,
        ChampionshipPlayers.assists,
        ChampionshipPlayers.penalties,
        ChampionshipPlayers.gaa,
    ]
    column_labels = {
        ChampionshipPlayers.id: "ID",
        ChampionshipPlayers.championship_id: "ID чемпионата",
        ChampionshipPlayers.team_id: "ID команды",
        ChampionshipPlayers.player_id: "ID игрока",
        ChampionshipPlayers.number: "Номер",
        ChampionshipPlayers.matches: "Матчи",
        ChampionshipPlayers.goals: "Голы",
        ChampionshipPlayers.assists: "Передачи",
        ChampionshipPlayers.penalties: "Штрафы",
    }

class TournamentPlayersAdmin(ModelView, model=TournamentPlayers):
    name = "Игрок в турнире"
    name_plural = "Игроки в турнирах"
    icon = "fa-solid fa-link"

    column_list = [
        TournamentPlayers.id,
        TournamentPlayers.tournament_id,
        TournamentPlayers.team_id,
        TournamentPlayers.player_id,
        TournamentPlayers.number,
        TournamentPlayers.matches,
        TournamentPlayers.goals,
        TournamentPlayers.assists,
        TournamentPlayers.penalties,
    ]
    column_searchable_list = [TournamentPlayers.player_id, TournamentPlayers.team_id]
    column_sortable_list = [
        TournamentPlayers.id,
        TournamentPlayers.tournament_id,
        TournamentPlayers.goals,
        TournamentPlayers.matches,
    ]
    form_columns = [
        TournamentPlayers.tournament_id,
        TournamentPlayers.team_id,
        TournamentPlayers.player_id,
        TournamentPlayers.number,
        TournamentPlayers.matches,
        TournamentPlayers.goals,
        TournamentPlayers.assists,
        TournamentPlayers.penalties,
        TournamentPlayers.gaa,
    ]
    column_labels = {
        TournamentPlayers.id: "ID",
        TournamentPlayers.tournament_id: "ID чемпионата",
        TournamentPlayers.team_id: "ID команды",
        TournamentPlayers.player_id: "ID игрока",
        TournamentPlayers.number: "Номер",
        TournamentPlayers.matches: "Матчи",
        TournamentPlayers.goals: "Голы",
        TournamentPlayers.assists: "Передачи",
        TournamentPlayers.penalties: "Штрафы",
    }

# ----------------------------------------------------------------------------------------------------------------------

class ChampionshipTeamsAdmin(LinkView, model=ChampionshipTeams):
    name = "Команда в чемпионате"
    name_plural = "Команды в чемпионатах"
    icon = "fa-solid fa-link"

    column_list = [
        ChampionshipTeams.id,
        ChampionshipTeams.championship_id,
        ChampionshipTeams.team_id,
        ChampionshipTeams.wins,
        ChampionshipTeams.losses,
        ChampionshipTeams.draws,
        ChampionshipTeams.goals_scored,
        ChampionshipTeams.goals_conceded,
        ChampionshipTeams.games,
        ChampionshipTeams.extra_points,
    ]
    column_sortable_list = [
        ChampionshipTeams.id,
        ChampionshipTeams.championship_id,
        ChampionshipTeams.team_id,
        ChampionshipTeams.wins,
        ChampionshipTeams.extra_points,
    ]
    form_columns = [
        ChampionshipTeams.championship_id,
        ChampionshipTeams.team_id,
        ChampionshipTeams.wins,
        ChampionshipTeams.losses,
        ChampionshipTeams.draws,
        ChampionshipTeams.goals_scored,
        ChampionshipTeams.goals_conceded,
        ChampionshipTeams.games,
        ChampionshipTeams.extra_points,
    ]

class ChampionshipGamesAdmin(LinkView, model=ChampionshipGames):
    name = "Игра в чемпионате"
    name_plural = "Игры в чемпионатах"
    icon = "fa-solid fa-link"

    column_list = [
        ChampionshipGames.id,
        ChampionshipGames.championship_id,
        ChampionshipGames.game_id,
    ]
    column_sortable_list = [ChampionshipGames.id, ChampionshipGames.championship_id]
    form_columns = [ChampionshipGames.championship_id, ChampionshipGames.game_id]

class TournamentTeamsAdmin(LinkView, model=TournamentTeams):
    name = "Команда в турнире"
    name_plural = "Команды в турнирах"
    icon = "fa-solid fa-link"

    column_list = [
        TournamentTeams.id,
        TournamentTeams.tournament_id,
        TournamentTeams.team_id,
        TournamentTeams.wins,
        TournamentTeams.losses,
        TournamentTeams.draws,
        TournamentTeams.goals_scored,
        TournamentTeams.goals_conceded,
        TournamentTeams.games,
        TournamentTeams.extra_points,
    ]
    column_sortable_list = [
        TournamentTeams.id,
        TournamentTeams.tournament_id,
        TournamentTeams.team_id,
        TournamentTeams.wins,
        TournamentTeams.extra_points,
    ]
    form_columns = [
        TournamentTeams.tournament_id,
        TournamentTeams.team_id,
        TournamentTeams.wins,
        TournamentTeams.losses,
        TournamentTeams.draws,
        TournamentTeams.goals_scored,
        TournamentTeams.goals_conceded,
        TournamentTeams.games,
        TournamentTeams.extra_points,
    ]

class TournamentGamesAdmin(LinkView, model=TournamentGames):
    name = "Игра в турнире"
    name_plural = "Игры в турнирах"
    icon = "fa-solid fa-link"

    column_list = [
        TournamentGames.id,
        TournamentGames.tournament_id,
        TournamentGames.game_id,
    ]
    column_sortable_list = [TournamentGames.id, TournamentGames.tournament_id]
    form_columns = [TournamentGames.tournament_id, TournamentGames.game_id]

def setup_admin(app):
    """Настройка и подключение админ-панели к приложению"""
    try:
        admin = Admin(
            app=app,
            engine=engine,
            title="Time Of The Stars",
            authentication_backend=authentication_backend,
            base_url="/admin",
        )
        
        # Регистрируем все модели
        admin.add_view(TeamAdmin)
        admin.add_view(PlayerAdmin)
        admin.add_view(GameAdmin)
        admin.add_view(ChampionshipAdmin)
        admin.add_view(TournamentAdmin)
        admin.add_view(ChampionshipPlayersAdmin)
        admin.add_view(TournamentPlayersAdmin)
        admin.add_view(ChampionshipTeamsAdmin)
        admin.add_view(ChampionshipGamesAdmin)
        admin.add_view(TournamentTeamsAdmin)
        admin.add_view(TournamentGamesAdmin)
        
        return admin
    except Exception as e:
        import logging
        logger = logging.getLogger(__name__)
        logger.error(f"Ошибка при инициализации админ-панели: {e}")
        return None
