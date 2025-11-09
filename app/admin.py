from sqladmin import Admin, ModelView
from sqladmin.authentication import AuthenticationBackend
from fastapi import Request
from sqlalchemy.future import select

from app.db.base import engine, session_maker
from app.config import settings
from app.utils.password import pwd_context
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
    AdminUser,
)

class LinkView(ModelView):
    category = "Связующие таблицы"
    # can_create = False
    # can_edit = False
    can_delete = False

class AdminAuth(AuthenticationBackend):
    async def login(self, request: Request) -> bool:
        form = await request.form()
        username = form.get("username")
        password = form.get("password")
        
        if not username or not password:
            return False
        
        # Проверяем пользователя в БД
        async with session_maker() as session:
            result = await session.execute(
                select(AdminUser).where(AdminUser.username == username)
            )
            admin_user = result.scalar_one_or_none()
            
            if admin_user and admin_user.is_active:
                # Проверяем пароль
                if pwd_context.verify(password, admin_user.hashed_password):
                    request.session.update({
                        "authenticated": True,
                        "user_id": admin_user.id,
                        "username": admin_user.username
                    })
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
        Team.players_count: "Количество игроков",
        Team.logo_url: "Ссылка на логотип",
        Team.championship_entries:"Чемпионаты",
        Team.tournament_entries:"Турниры",
        Team.championship_players: "Игроки чемпионатов",
        Team.tournament_players: "Игроки турниров",
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
        Player.birth_date: "День рождения",
        Player.grip: "Хват",
        Player.photo_url: "Ссылка на фото"
    }

class GameAdmin(ModelView, model=Game):
    name = "Игра"
    name_plural = "Игры"
    icon = "fa-solid fa-gamepad"

    column_list = [
        Game.id,
        Game.team_a,
        Game.team_b,
        Game.score_team_a,
        Game.score_team_b,
        Game.date,
        Game.time,
        Game.location,
    ]
    column_searchable_list = [Game.date, Game.team_a, Game.team_b, Game.location,]
    column_sortable_list = [Game.id, Game.date, Game.time]
    form_columns = [
        Game.team_a,
        Game.team_b,
        Game.score_team_a,
        Game.score_team_b,
        Game.date,
        Game.time,
        Game.location,
        Game.bullet_team,
    ]
    column_labels = {
        Game.id: "ID",
        Game.team_a: "Команда А",
        Game.team_b: "Команда B",
        Game.score_team_a: "Счёт команды А",
        Game.score_team_b: "Счёт команды B",
        Game.date: "Дата игры",
        Game.time: "Время игры",
        Game.location: "Локация",
        Game.bullet_team: "Победитель буллитов"
    }
    column_formatters = {
        Game.team_a: lambda m, c: m.team_a.name if m.team_a else "-",
        Game.team_b: lambda m, c: m.team_b.name if m.team_b else "-",
        Game.bullet_team: lambda m, c: m.bullet_team.name if m.bullet_team else "-",
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
        ChampionshipPlayers.championship,
        ChampionshipPlayers.team,
        ChampionshipPlayers.player,
        ChampionshipPlayers.number,
        ChampionshipPlayers.matches,
        ChampionshipPlayers.goals,
        ChampionshipPlayers.assists,
        ChampionshipPlayers.penalties,
    ]
    column_searchable_list = [ChampionshipPlayers.player, ChampionshipPlayers.team]
    column_sortable_list = [
        ChampionshipPlayers.id,
        ChampionshipPlayers.championship,
        ChampionshipPlayers.goals,
        ChampionshipPlayers.matches,
    ]
    form_columns = [
        ChampionshipPlayers.championship,
        ChampionshipPlayers.team,
        ChampionshipPlayers.player,
        ChampionshipPlayers.number,
        ChampionshipPlayers.matches,
        ChampionshipPlayers.goals,
        ChampionshipPlayers.assists,
        ChampionshipPlayers.penalties,
        ChampionshipPlayers.gaa,
    ]
    column_labels = {
        ChampionshipPlayers.id: "ID",
        ChampionshipPlayers.championship: "Чемпионат",
        ChampionshipPlayers.team: "Команда",
        ChampionshipPlayers.player: "Игрок",
        ChampionshipPlayers.number: "Номер",
        ChampionshipPlayers.matches: "Матчи",
        ChampionshipPlayers.goals: "Голы",
        ChampionshipPlayers.assists: "Передачи",
        ChampionshipPlayers.penalties: "Штрафы",
        ChampionshipPlayers.gaa: "Коэффициент надёжности (КН) вратаря"
    }

class TournamentPlayersAdmin(ModelView, model=TournamentPlayers):
    name = "Игрок в турнире"
    name_plural = "Игроки в турнирах"
    icon = "fa-solid fa-link"

    column_list = [
        TournamentPlayers.id,
        TournamentPlayers.tournament,
        TournamentPlayers.team,
        TournamentPlayers.player,
        TournamentPlayers.number,
        TournamentPlayers.matches,
        TournamentPlayers.goals,
        TournamentPlayers.assists,
        TournamentPlayers.penalties,
    ]
    column_searchable_list = [TournamentPlayers.player, TournamentPlayers.team]
    column_sortable_list = [
        TournamentPlayers.id,
        TournamentPlayers.tournament,
        TournamentPlayers.goals,
        TournamentPlayers.matches,
    ]
    form_columns = [
        TournamentPlayers.tournament,
        TournamentPlayers.team,
        TournamentPlayers.player,
        TournamentPlayers.number,
        TournamentPlayers.matches,
        TournamentPlayers.goals,
        TournamentPlayers.assists,
        TournamentPlayers.penalties,
        TournamentPlayers.gaa,
    ]
    column_labels = {
        TournamentPlayers.id: "ID",
        TournamentPlayers.tournament: "Чемпионат",
        TournamentPlayers.team: "Команда",
        TournamentPlayers.player: "Игрок",
        TournamentPlayers.number: "Номер",
        TournamentPlayers.matches: "Матчи",
        TournamentPlayers.goals: "Голы",
        TournamentPlayers.assists: "Передачи",
        TournamentPlayers.penalties: "Штрафы",
        TournamentPlayers.gaa: "Коэффициент надёжности (КН) вратаря"
    }

# ----------------------------------------------------------------------------------------------------------------------

class ChampionshipTeamsAdmin(LinkView, model=ChampionshipTeams):
    name = "Команда в чемпионате"
    name_plural = "Команды в чемпионатах"
    icon = "fa-solid fa-link"

    column_list = [
        ChampionshipTeams.id,
        ChampionshipTeams.championship,
        ChampionshipTeams.team,
        ChampionshipTeams.wins,
        ChampionshipTeams.losses,
        ChampionshipTeams.draws,
        ChampionshipTeams.goals_scored,
        ChampionshipTeams.goals_conceded,
        ChampionshipTeams.games,
        ChampionshipTeams.points,
        ChampionshipTeams.extra_points,
    ]
    column_sortable_list = [
        ChampionshipTeams.id,
        ChampionshipTeams.championship,
        ChampionshipTeams.team,
        ChampionshipTeams.wins,
        ChampionshipTeams.losses,
        ChampionshipTeams.draws,
        ChampionshipTeams.goals_scored,
        ChampionshipTeams.goals_conceded,
        ChampionshipTeams.games,
        ChampionshipTeams.points,
        ChampionshipTeams.extra_points,
    ]
    form_columns = [
        ChampionshipTeams.championship,
        ChampionshipTeams.team,
        ChampionshipTeams.wins,
        ChampionshipTeams.losses,
        ChampionshipTeams.draws,
        ChampionshipTeams.goals_scored,
        ChampionshipTeams.goals_conceded,
        ChampionshipTeams.games,
        ChampionshipTeams.points,
        ChampionshipTeams.extra_points,
    ]
    column_labels = {
        ChampionshipTeams.championship: "Чемпионат",
        ChampionshipTeams.team: "Команда",
        ChampionshipTeams.wins: "Победы",
        ChampionshipTeams.losses: "Поражения",
        ChampionshipTeams.draws: "Ничьи",
        ChampionshipTeams.goals_scored: "Забито",
        ChampionshipTeams.goals_conceded: "Пропущено",
        ChampionshipTeams.games: "К-во игр",
        ChampionshipTeams.points: "Очки",
        ChampionshipTeams.extra_points: "Доп. очки"
    }

class TournamentTeamsAdmin(LinkView, model=TournamentTeams):
    name = "Команда в турнире"
    name_plural = "Команды в турнирах"
    icon = "fa-solid fa-link"

    column_list = [
        TournamentTeams.id,
        TournamentTeams.tournament,
        TournamentTeams.team,
        TournamentTeams.wins,
        TournamentTeams.losses,
        TournamentTeams.draws,
        TournamentTeams.goals_scored,
        TournamentTeams.goals_conceded,
        TournamentTeams.games,
        TournamentTeams.points,
        TournamentTeams.extra_points,
    ]
    column_sortable_list = [
        TournamentTeams.id,
        TournamentTeams.tournament,
        TournamentTeams.team,
        TournamentTeams.wins,
        TournamentTeams.losses,
        TournamentTeams.draws,
        TournamentTeams.goals_scored,
        TournamentTeams.goals_conceded,
        TournamentTeams.games,
        TournamentTeams.points,
        TournamentTeams.extra_points
    ]
    form_columns = [
        TournamentTeams.tournament,
        TournamentTeams.team,
        TournamentTeams.wins,
        TournamentTeams.losses,
        TournamentTeams.draws,
        TournamentTeams.goals_scored,
        TournamentTeams.goals_conceded,
        TournamentTeams.games,
        TournamentTeams.points,
        TournamentTeams.extra_points,
    ]
    column_labels = {
        TournamentTeams.tournament: "Туринир",
        TournamentTeams.team: "Команда",
        TournamentTeams.wins: "Победы",
        TournamentTeams.losses: "Поражения",
        TournamentTeams.draws: "Ничьи",
        TournamentTeams.goals_scored: "Забито",
        TournamentTeams.goals_conceded: "Пропущено",
        TournamentTeams.games: "К-во игр",
        TournamentTeams.points: "Очки",
        TournamentTeams.extra_points: "Доп. очки"
    }

class ChampionshipGamesAdmin(LinkView, model=ChampionshipGames):
    name = "Игра в чемпионате"
    name_plural = "Игры в чемпионатах"
    icon = "fa-solid fa-link"

    column_list = [
        ChampionshipGames.id,
        ChampionshipGames.championship,
        ChampionshipGames.game,
    ]
    form_columns = [ChampionshipGames.championship, ChampionshipGames.game]

class TournamentGamesAdmin(LinkView, model=TournamentGames):
    name = "Игра в турнире"
    name_plural = "Игры в турнирах"
    icon = "fa-solid fa-link"

    column_list = [
        TournamentGames.id,
        TournamentGames.tournament,
        TournamentGames.game,
    ]
    column_sortable_list = [TournamentGames.id, TournamentGames.tournament]
    form_columns = [TournamentGames.tournament, TournamentGames.game]

class AdminUserAdmin(ModelView, model=AdminUser):
    name = "Администратор"
    name_plural = "Администраторы"
    icon = "fa-solid fa-user-shield"
    
    column_list = [AdminUser.id, AdminUser.username, AdminUser.is_active]
    column_searchable_list = [AdminUser.username]
    form_columns = [AdminUser.username, AdminUser.hashed_password, AdminUser.is_active]
    column_labels = {
        AdminUser.id: "ID",
        AdminUser.username: "Имя пользователя",
        AdminUser.hashed_password: "Пароль (будет автоматически захеширован)",
        AdminUser.is_active: "Активен",
    }

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
        admin.add_view(TournamentTeamsAdmin)
        admin.add_view(ChampionshipGamesAdmin)
        admin.add_view(TournamentGamesAdmin)
        admin.add_view(AdminUserAdmin)
        
        return admin
    except Exception as e:
        import logging
        logger = logging.getLogger(__name__)
        logger.error(f"Ошибка при инициализации админ-панели: {e}")
        return None
