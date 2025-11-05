from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Tournament import Tournament
from app.db.models.TournamentTeams import TournamentTeams
from app.db.models.TournamentPlayers import TournamentPlayers
from app.db.models.TournamentGames import TournamentGames
from app.db.models.Team import Team
from app.db.models.Player import Player
from app.db.models.Game import Game
from app.schemas import TournamentCreate, TournamentUpdate


async def list_tournaments(db: AsyncSession) -> Sequence[Tournament]:
    result = await db.execute(select(Tournament).order_by(Tournament.id))
    return result.scalars().all()


async def get_tournament(db: AsyncSession, tournament_id: int) -> Tournament | None:
    result = await db.execute(select(Tournament).where(Tournament.id == tournament_id))
    return result.scalar_one_or_none()


async def create_tournament(db: AsyncSession, data: TournamentCreate) -> Tournament:
    item = Tournament(**data.model_dump())
    db.add(item)
    await db.flush()
    await db.refresh(item)
    return item


async def update_tournament(db: AsyncSession, tournament_id: int, data: TournamentUpdate) -> Tournament | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_tournament(db, tournament_id)
    await db.execute(
        update(Tournament).where(Tournament.id == tournament_id).values(**payload)
    )
    result = await db.execute(select(Tournament).where(Tournament.id == tournament_id))
    return result.scalar_one_or_none()


async def delete_tournament(db: AsyncSession, tournament_id: int) -> bool:
    result = await db.execute(
        delete(Tournament).where(Tournament.id == tournament_id).returning(Tournament.id)
    )
    return result.scalar_one_or_none() is not None


# Linking operations
async def add_team(db: AsyncSession, tournament_id: int, team_id: int) -> None:
    exists_q = select(TournamentTeams.id).where(
        TournamentTeams.tournament_id == tournament_id,
        TournamentTeams.team_id == team_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = TournamentTeams(tournament_id=tournament_id, team_id=team_id)
        db.add(link)


async def remove_team(db: AsyncSession, tournament_id: int, team_id: int) -> bool:
    result = await db.execute(
        delete(TournamentTeams)
        .where(
            TournamentTeams.tournament_id == tournament_id,
            TournamentTeams.team_id == team_id,
        )
        .returning(TournamentTeams.id)
    )
    return result.scalar_one_or_none() is not None


async def add_player(
    db: AsyncSession,
    tournament_id: int,
    team_id: int,
    player_id: int,
    number: int | None,
) -> None:
    exists_q = select(TournamentPlayers.id).where(
        TournamentPlayers.tournament_id == tournament_id,
        TournamentPlayers.team_id == team_id,
        TournamentPlayers.player_id == player_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = TournamentPlayers(
            tournament_id=tournament_id,
            team_id=team_id,
            player_id=player_id,
            number=number,
        )
        db.add(link)


async def remove_player(
    db: AsyncSession, tournament_id: int, team_id: int, player_id: int
) -> bool:
    result = await db.execute(
        delete(TournamentPlayers)
        .where(
            TournamentPlayers.tournament_id == tournament_id,
            TournamentPlayers.team_id == team_id,
            TournamentPlayers.player_id == player_id,
        )
        .returning(TournamentPlayers.id)
    )
    return result.scalar_one_or_none() is not None


async def add_game(db: AsyncSession, tournament_id: int, game_id: int) -> None:
    exists_q = select(TournamentGames.id).where(
        TournamentGames.tournament_id == tournament_id,
        TournamentGames.game_id == game_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = TournamentGames(tournament_id=tournament_id, game_id=game_id)
        db.add(link)
        await db.flush()
        # Пересчитываем статистику команд после добавления игры
        await recalculate_tournament_teams_stats(db, tournament_id, game_id)


async def remove_game(db: AsyncSession, tournament_id: int, game_id: int) -> bool:
    result = await db.execute(
        delete(TournamentGames)
        .where(
            TournamentGames.tournament_id == tournament_id,
            TournamentGames.game_id == game_id,
        )
        .returning(TournamentGames.id)
    )
    deleted = result.scalar_one_or_none() is not None
    
    if deleted:
        # Пересчитываем статистику всех команд после удаления игры
        await recalculate_tournament_teams_stats(db, tournament_id, None)
    
    return deleted


# Get methods with statistics
async def get_tournament_teams(db: AsyncSession, tournament_id: int) -> Sequence[dict]:
    """Возвращает команды в турнире со статистикой"""
    result = await db.execute(
        select(TournamentTeams, Team)
        .join(Team, TournamentTeams.team_id == Team.id)
        .where(TournamentTeams.tournament_id == tournament_id)
        .order_by(Team.name)
    )
    rows = result.all()
    
    teams = []
    for tt, team in rows:
        teams.append({
            "id": team.id,
            "name": team.name,
            "slug": team.slug,
            "city": team.city,
            "players_count": team.players_count,
            "logo_url": team.logo_url,
            "stats": {
                "wins": tt.wins,
                "losses": tt.losses,
                "draws": tt.draws,
                "goals_scored": tt.goals_scored,
                "goals_conceded": tt.goals_conceded,
                "games": tt.games,
                "extra_points": tt.extra_points,
            }
        })
    return teams


async def get_tournament_players(db: AsyncSession, tournament_id: int) -> Sequence[dict]:
    """Возвращает игроков в турнире со статистикой"""
    result = await db.execute(
        select(TournamentPlayers, Player, Team)
        .join(Player, TournamentPlayers.player_id == Player.id)
        .join(Team, TournamentPlayers.team_id == Team.id)
        .where(TournamentPlayers.tournament_id == tournament_id)
        .order_by(Team.name, TournamentPlayers.number)
    )
    rows = result.all()
    
    players = []
    for tp, player, team in rows:
        players.append({
            "id": player.id,
            "full_name": player.full_name,
            "birth_date": player.birth_date,
            "position": player.position,
            "grip": player.grip,
            "photo_url": player.photo_url,
            "team_id": team.id,
            "team_name": team.name,
            "stats": {
                "number": tp.number,
                "matches": tp.matches,
                "goals": tp.goals,
                "assists": tp.assists,
                "penalties": tp.penalties,
                "gaa": tp.gaa,
            }
        })
    return players


async def get_tournament_games(db: AsyncSession, tournament_id: int) -> Sequence[Game]:
    """Возвращает игры в турнире"""
    result = await db.execute(
        select(Game)
        .join(TournamentGames, Game.id == TournamentGames.game_id)
        .where(TournamentGames.tournament_id == tournament_id)
        .order_by(Game.date, Game.time)
    )
    return result.scalars().all()


async def recalculate_tournament_teams_stats(
    db: AsyncSession, tournament_id: int, game_id: int | None = None
) -> None:
    """Пересчитывает статистику всех команд в турнире на основе игр"""
    # Получаем все игры турнира
    if game_id:
        # Пересчитываем только для команд, участвующих в этой игре
        game_result = await db.execute(select(Game).where(Game.id == game_id))
        game = game_result.scalar_one_or_none()
        if not game or game.score_team_a is None or game.score_team_b is None:
            return  # Игра еще не сыграна
        
        team_ids = [game.team_a_id, game.team_b_id]
    else:
        # Пересчитываем для всех команд
        team_ids = None
    
    # Получаем все игры турнира с результатами
    games_query = (
        select(Game)
        .join(TournamentGames, Game.id == TournamentGames.game_id)
        .where(
            TournamentGames.tournament_id == tournament_id,
            Game.score_team_a.isnot(None),
            Game.score_team_b.isnot(None),
        )
    )
    
    games_result = await db.execute(games_query)
    games = games_result.scalars().all()
    
    # Получаем все команды в турнире
    if team_ids:
        teams_query = select(TournamentTeams).where(
            TournamentTeams.tournament_id == tournament_id,
            TournamentTeams.team_id.in_(team_ids),
        )
    else:
        teams_query = select(TournamentTeams).where(
            TournamentTeams.tournament_id == tournament_id
        )
    
    teams_result = await db.execute(teams_query)
    tournament_teams = teams_result.scalars().all()
    
    # Пересчитываем статистику для каждой команды
    for tt in tournament_teams:
        wins = 0
        losses = 0
        draws = 0
        goals_scored = 0
        goals_conceded = 0
        games_count = 0
        
        for game in games:
            # Проверяем, участвует ли команда в этой игре
            if game.team_a_id == tt.team_id:
                if game.score_team_a is not None and game.score_team_b is not None:
                    goals_scored += game.score_team_a
                    goals_conceded += game.score_team_b
                    games_count += 1
                    
                    if game.score_team_a > game.score_team_b:
                        wins += 1
                    elif game.score_team_a < game.score_team_b:
                        losses += 1
                    else:
                        draws += 1
            elif game.team_b_id == tt.team_id:
                if game.score_team_a is not None and game.score_team_b is not None:
                    goals_scored += game.score_team_b
                    goals_conceded += game.score_team_a
                    games_count += 1
                    
                    if game.score_team_b > game.score_team_a:
                        wins += 1
                    elif game.score_team_b < game.score_team_a:
                        losses += 1
                    else:
                        draws += 1
        
        # Обновляем статистику команды
        tt.wins = wins
        tt.losses = losses
        tt.draws = draws
        tt.goals_scored = goals_scored
        tt.goals_conceded = goals_conceded
        tt.games = games_count
        # extra_points можно настроить отдельно (например, 3 за победу, 1 за ничью)
        tt.extra_points = wins * 3 + draws * 1





