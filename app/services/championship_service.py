from typing import Sequence

from sqlalchemy import select, update, delete
from sqlalchemy.ext.asyncio import AsyncSession

from app.db.models.Championship import Championship
from app.db.models.ChampionshipTeams import ChampionshipTeams
from app.db.models.ChampionshipPlayers import ChampionshipPlayers
from app.db.models.ChampionshipGames import ChampionshipGames
from app.db.models.Team import Team
from app.db.models.Player import Player
from app.db.models.Game import Game
from app.schemas import ChampionshipCreate, ChampionshipUpdate


async def list_championships(db: AsyncSession) -> Sequence[Championship]:
    result = await db.execute(select(Championship).order_by(Championship.id))
    return result.scalars().all()


async def get_championship(db: AsyncSession, championship_id: int) -> Championship | None:
    result = await db.execute(select(Championship).where(Championship.id == championship_id))
    return result.scalar_one_or_none()


async def create_championship(db: AsyncSession, data: ChampionshipCreate) -> Championship:
    item = Championship(**data.model_dump())
    db.add(item)
    await db.flush()
    await db.refresh(item)
    return item


async def update_championship(db: AsyncSession, championship_id: int, data: ChampionshipUpdate) -> Championship | None:
    payload = {k: v for k, v in data.model_dump(exclude_unset=True).items()}
    if not payload:
        return await get_championship(db, championship_id)
    await db.execute(
        update(Championship).where(Championship.id == championship_id).values(**payload)
    )
    result = await db.execute(select(Championship).where(Championship.id == championship_id))
    return result.scalar_one_or_none()


async def delete_championship(db: AsyncSession, championship_id: int) -> bool:
    result = await db.execute(
        delete(Championship)
        .where(Championship.id == championship_id)
        .returning(Championship.id)
    )
    return result.scalar_one_or_none() is not None


# Linking operations
async def add_team(db: AsyncSession, championship_id: int, team_id: int) -> None:
    exists_q = select(ChampionshipTeams.id).where(
        ChampionshipTeams.championship_id == championship_id,
        ChampionshipTeams.team_id == team_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = ChampionshipTeams(championship_id=championship_id, team_id=team_id)
        db.add(link)


async def remove_team(db: AsyncSession, championship_id: int, team_id: int) -> bool:
    result = await db.execute(
        delete(ChampionshipTeams)
        .where(
            ChampionshipTeams.championship_id == championship_id,
            ChampionshipTeams.team_id == team_id,
        )
        .returning(ChampionshipTeams.id)
    )
    return result.scalar_one_or_none() is not None


async def add_player(
    db: AsyncSession,
    championship_id: int,
    team_id: int,
    player_id: int,
    number: int | None,
) -> None:
    exists_q = select(ChampionshipPlayers.id).where(
        ChampionshipPlayers.championship_id == championship_id,
        ChampionshipPlayers.team_id == team_id,
        ChampionshipPlayers.player_id == player_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = ChampionshipPlayers(
            championship_id=championship_id,
            team_id=team_id,
            player_id=player_id,
            number=number,
        )
        db.add(link)


async def remove_player(
    db: AsyncSession, championship_id: int, team_id: int, player_id: int
) -> bool:
    result = await db.execute(
        delete(ChampionshipPlayers)
        .where(
            ChampionshipPlayers.championship_id == championship_id,
            ChampionshipPlayers.team_id == team_id,
            ChampionshipPlayers.player_id == player_id,
        )
        .returning(ChampionshipPlayers.id)
    )
    return result.scalar_one_or_none() is not None


async def ensure_teams_in_championship(db: AsyncSession, championship_id: int, game_id: int) -> None:
    """Вспомогательная функция: добавляет команды из игры в ChampionshipTeams, если их там еще нет"""
    game_result = await db.execute(select(Game).where(Game.id == game_id))
    game = game_result.scalar_one_or_none()
    
    if game:
        # Автоматически добавляем команды в ChampionshipTeams, если их там еще нет
        for team_id in [game.team_a_id, game.team_b_id]:
            if team_id:
                team_exists_q = select(ChampionshipTeams.id).where(
                    ChampionshipTeams.championship_id == championship_id,
                    ChampionshipTeams.team_id == team_id,
                )
                team_exists = (await db.execute(team_exists_q)).scalar_one_or_none()
                if team_exists is None:
                    team_link = ChampionshipTeams(
                        championship_id=championship_id,
                        team_id=team_id,
                    )
                    db.add(team_link)
        await db.flush()


async def add_game(db: AsyncSession, championship_id: int, game_id: int) -> None:
    exists_q = select(ChampionshipGames.id).where(
        ChampionshipGames.championship_id == championship_id,
        ChampionshipGames.game_id == game_id,
    )
    exists = (await db.execute(exists_q)).scalar_one_or_none()
    if exists is None:
        link = ChampionshipGames(championship_id=championship_id, game_id=game_id)
        db.add(link)
        await db.flush()
        
        # Автоматически добавляем команды в ChampionshipTeams, если их там еще нет
        await ensure_teams_in_championship(db, championship_id, game_id)
        
        # Пересчитываем статистику команд после добавления игры
        await recalculate_championship_teams_stats(db, championship_id, game_id)


async def remove_game(db: AsyncSession, championship_id: int, game_id: int) -> bool:
    result = await db.execute(
        delete(ChampionshipGames)
        .where(
            ChampionshipGames.championship_id == championship_id,
            ChampionshipGames.game_id == game_id,
        )
        .returning(ChampionshipGames.id)
    )
    deleted = result.scalar_one_or_none() is not None
    
    if deleted:
        # Пересчитываем статистику всех команд после удаления игры
        await recalculate_championship_teams_stats(db, championship_id, None)
    
    return deleted


# Get methods with statistics
async def get_championship_teams(db: AsyncSession, championship_id: int) -> Sequence[dict]:
    """Возвращает команды в чемпионате со статистикой"""
    result = await db.execute(
        select(ChampionshipTeams, Team)
        .join(Team, ChampionshipTeams.team_id == Team.id)
        .where(ChampionshipTeams.championship_id == championship_id)
        .order_by(Team.name)
    )
    rows = result.all()
    
    teams = []
    for ct, team in rows:
        teams.append({
            "id": team.id,
            "name": team.name,
            "slug": team.slug,
            "city": team.city,
            "players_count": team.players_count,
            "logo_url": team.logo_url,
            "stats": {
                "wins": ct.wins,
                "losses": ct.losses,
                "draws": ct.draws,
                "goals_scored": ct.goals_scored,
                "goals_conceded": ct.goals_conceded,
                "games": ct.games,
                "points": ct.points,
                "extra_points": ct.extra_points,
            }
        })
    return teams


async def get_championship_players(db: AsyncSession, championship_id: int) -> Sequence[dict]:
    """Возвращает игроков в чемпионате со статистикой"""
    result = await db.execute(
        select(ChampionshipPlayers, Player, Team)
        .join(Player, ChampionshipPlayers.player_id == Player.id)
        .join(Team, ChampionshipPlayers.team_id == Team.id)
        .where(ChampionshipPlayers.championship_id == championship_id)
        .order_by(Team.name, ChampionshipPlayers.number)
    )
    rows = result.all()
    
    players = []
    for cp, player, team in rows:
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
                "number": cp.number,
                "matches": cp.matches,
                "goals": cp.goals,
                "assists": cp.assists,
                "penalties": cp.penalties,
                "gaa": cp.gaa,
            }
        })
    return players


async def get_championship_games(db: AsyncSession, championship_id: int) -> Sequence[Game]:
    """Возвращает игры в чемпионате"""
    result = await db.execute(
        select(Game)
        .join(ChampionshipGames, Game.id == ChampionshipGames.game_id)
        .where(ChampionshipGames.championship_id == championship_id)
        .order_by(Game.date, Game.time)
    )
    return result.scalars().all()


async def recalculate_championship_teams_stats(
    db: AsyncSession, championship_id: int, game_id: int | None = None
) -> None:
    """Пересчитывает статистику всех команд в чемпионате на основе игр"""
    # Получаем все игры чемпионата
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
    
    # Получаем все игры чемпионата с результатами
    games_query = (
        select(Game)
        .join(ChampionshipGames, Game.id == ChampionshipGames.game_id)
        .where(
            ChampionshipGames.championship_id == championship_id,
            Game.score_team_a.isnot(None),
            Game.score_team_b.isnot(None),
        )
    )
    
    games_result = await db.execute(games_query)
    games = games_result.scalars().all()
    
    # Получаем все команды в чемпионате
    if team_ids:
        teams_query = select(ChampionshipTeams).where(
            ChampionshipTeams.championship_id == championship_id,
            ChampionshipTeams.team_id.in_(team_ids),
        )
    else:
        teams_query = select(ChampionshipTeams).where(
            ChampionshipTeams.championship_id == championship_id
        )
    
    teams_result = await db.execute(teams_query)
    championship_teams = teams_result.scalars().all()
    
    # Пересчитываем статистику для каждой команды
    for ct in championship_teams:
        wins = 0
        losses = 0
        draws = 0
        goals_scored = 0
        goals_conceded = 0
        games_count = 0
        extra_points = 0

        for game in games:
            # Проверяем, участвует ли команда в этой игре
            if game.team_a_id == ct.team_id:
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
                        if game.bullet_win_team == ct.team_id:
                            extra_points += 1
            elif game.team_b_id == ct.team_id:
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
                        if game.bullet_win_team == ct.team_id:
                            extra_points += 1
        
        # Обновляем статистику команды
        ct.wins = wins
        ct.losses = losses
        ct.draws = draws
        ct.goals_scored = goals_scored
        ct.goals_conceded = goals_conceded
        ct.games = games_count
        # points можно настроить отдельно (например, 3 за победу, 1 за ничью)
        ct.points = wins * 2 + draws * 1 + extra_points * 1
        ct.extra_points = extra_points





