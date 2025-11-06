import asyncio
from datetime import date, time, timedelta

from sqlalchemy.ext.asyncio import AsyncSession

from app.db.base import session_maker
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


async def seed_data():
    """Заполняет базу данных тестовыми данными"""
    async with session_maker() as session:
        # Очищаем данные (опционально, можно закомментировать)
        # await clear_data(session)
         await add_data(session)

async def add_data(session):
    # Создаём команды
    print("Создаю команды...")
    teams = [
        Team(name="Переславль-Залесский", slug="pereslavl", city="Переславль-Залесский"),
        Team(name="Зубр", slug="zubr", city="Ярославль"),
        Team(name="Вымпел-V", slug="vympelv", city="Ярославль"),
        Team(name="Ярославич", slug="yaroslavich", city="Ярославль"),
        Team(name="Торпедо", slug="torpedo", city="Ярославль"),
        Team(name="БГВ", slug="bgv", city="Ярославль"),
        Team(name="ЯВВУ ПВО", slug="pvo", city="Ярославль"),
        Team(name="Время звезд", slug="vremyazvezd", city="Ярославль"),
    ]
    session.add_all(teams)
    await session.flush()
    print(f"Создано {len(teams)} команд")

    # Создаём игроков
    print("Создаю игроков...")
    players_data = [
        # Команда 1 (Спартак)
        {"full_name": "Иванов Иван Иванович", "birth_date": date(1995, 5, 15), "position": "Нападающий",
         "grip": "Левый"},
        {"full_name": "Петров Петр Петрович", "birth_date": date(1996, 3, 20), "position": "Защитник",
         "grip": "Правый"},
        {"full_name": "Сидоров Сидор Сидорович", "birth_date": date(1997, 8, 10), "position": "Вратарь",
         "grip": "Левый"},
        {"full_name": "Кузнецов Алексей", "birth_date": date(1994, 11, 5), "position": "Нападающий", "grip": "Правый"},
        {"full_name": "Смирнов Дмитрий", "birth_date": date(1998, 2, 18), "position": "Защитник", "grip": "Левый"},

        # Команда 2 (ЦСКА)
        {"full_name": "Соколов Андрей", "birth_date": date(1995, 7, 22), "position": "Нападающий", "grip": "Правый"},
        {"full_name": "Попов Сергей", "birth_date": date(1996, 9, 30), "position": "Защитник", "grip": "Левый"},
        {"full_name": "Лебедев Максим", "birth_date": date(1997, 1, 12), "position": "Вратарь", "grip": "Правый"},
        {"full_name": "Новиков Владимир", "birth_date": date(1994, 4, 25), "position": "Нападающий", "grip": "Левый"},
        {"full_name": "Морозов Игорь", "birth_date": date(1998, 6, 8), "position": "Защитник", "grip": "Правый"},

        # Команда 3 (Динамо)
        {"full_name": "Волков Роман", "birth_date": date(1995, 10, 14), "position": "Нападающий", "grip": "Левый"},
        {"full_name": "Алексеев Павел", "birth_date": date(1996, 12, 3), "position": "Защитник", "grip": "Правый"},
        {"full_name": "Романов Александр", "birth_date": date(1997, 5, 19), "position": "Вратарь", "grip": "Левый"},
        {"full_name": "Сергеев Михаил", "birth_date": date(1994, 8, 27), "position": "Нападающий", "grip": "Правый"},
        {"full_name": "Федоров Николай", "birth_date": date(1998, 3, 11), "position": "Защитник", "grip": "Левый"},

        # Команда 4 (Зенит)
        {"full_name": "Ильин Артем", "birth_date": date(1995, 6, 7), "position": "Нападающий", "grip": "Правый"},
        {"full_name": "Козлов Евгений", "birth_date": date(1996, 11, 23), "position": "Защитник", "grip": "Левый"},
        {"full_name": "Степанов Константин", "birth_date": date(1997, 2, 16), "position": "Вратарь", "grip": "Правый"},
        {"full_name": "Николаев Виталий", "birth_date": date(1994, 9, 4), "position": "Нападающий", "grip": "Левый"},
        {"full_name": "Орлов Станислав", "birth_date": date(1998, 7, 29), "position": "Защитник", "grip": "Правый"},

        # Команда 5 (Локомотив)
        {"full_name": "Андреев Григорий", "birth_date": date(1995, 4, 13), "position": "Нападающий", "grip": "Левый"},
        {"full_name": "Макаров Олег", "birth_date": date(1996, 10, 21), "position": "Защитник", "grip": "Правый"},
        {"full_name": "Никитин Вадим", "birth_date": date(1997, 1, 6), "position": "Вратарь", "grip": "Левый"},
        {"full_name": "Зайцев Руслан", "birth_date": date(1994, 12, 17), "position": "Нападающий", "grip": "Правый"},
        {"full_name": "Соловьев Антон", "birth_date": date(1998, 8, 2), "position": "Защитник", "grip": "Левый"},
    ]

    players = [Player(**data) for data in players_data]
    session.add_all(players)
    await session.flush()
    print(f"Создано {len(players)} игроков")

    # Создаём игры
    print("Создаю игры...")
    games = [
        Game(
            team_a_id=teams[3].id,
            team_b_id=teams[1].id,
            score_team_a=2,
            score_team_b=8,
            date=date(2025,9,9),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[4].id,
            team_b_id=teams[2].id,
            score_team_a=3,
            score_team_b=9,
            date=date(2025, 9, 10),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[0].id,
            team_b_id=teams[5].id,
            score_team_a=13,
            score_team_b=1,
            date=date(2025, 9, 12),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        # --------------------------------------------------------------------------------------------------------------
        Game(
            team_a_id=teams[3].id,
            team_b_id=teams[4].id,
            score_team_a=5,
            score_team_b=3,
            date=date(2025, 9, 16),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[2].id,
            team_b_id=teams[5].id,
            score_team_a=7,
            score_team_b=3,
            date=date(2025, 9, 17),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[0].id,
            team_b_id=teams[1].id,
            score_team_a=9,
            score_team_b=3,
            date=date(2025, 9, 19),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        # --------------------------------------------------------------------------------------------------------------
        Game(
            team_a_id=teams[1].id,
            team_b_id=teams[2].id,
            score_team_a=3,
            score_team_b=2,
            date=date(2025, 9, 23),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[4].id,
            team_b_id=teams[5].id,
            score_team_a=7,
            score_team_b=7,
            date=date(2025, 9, 24),
            time=time(20, 0),
            location="СК «Торпедо»",
            bullet_win_team=teams[5].id
        ),
        Game(
            team_a_id=teams[2].id,
            team_b_id=teams[3].id,
            score_team_a=10,
            score_team_b=3,
            date=date(2025, 9, 30),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        # --------------------------------------------------------------------------------------------------------------
        Game(
            team_a_id=teams[1].id,
            team_b_id=teams[5].id,
            score_team_a=3,
            score_team_b=4,
            date=date(2025, 10, 1),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[0].id,
            team_b_id=teams[4].id,
            score_team_a=6,
            score_team_b=7,
            date=date(2025, 10, 3),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[3].id,
            team_b_id=teams[5].id,
            score_team_a=4,
            score_team_b=6,
            date=date(2025, 10, 7),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        # --------------------------------------------------------------------------------------------------------------
        Game(
            team_a_id=teams[0].id,
            team_b_id=teams[2].id,
            score_team_a=1,
            score_team_b=5,
            date=date(2025, 10, 8),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
        Game(
            team_a_id=teams[1].id,
            team_b_id=teams[4].id,
            score_team_a=3,
            score_team_b=3,
            date=date(2025, 10, 10),
            time=time(20, 0),
            location="СК «Торпедо»",
            bullet_win_team=teams[4].id
        ),
        Game(
            team_a_id=teams[3].id,
            team_b_id=teams[0].id,
            score_team_a=4,
            score_team_b=7,
            date=date(2025, 10, 14),
            time=time(20, 0),
            location="СК «Торпедо»",
        ),
    ]
    session.add_all(games)
    await session.flush()
    print(f"Создано {len(games)} игр")

    # Создаём чемпионат
    # print("Создаю чемпионат...")
    # championship = Championship(
    #     name="Звезда Отечества",
    #     start_date=date(2025, 10, 21),
    #     location="СК «Торпедо», ГУОР, СК «Переславль»",
    # )
    # session.add(championship)
    # await session.flush()
    # print("Чемпионат создан")

    # # Связываем команды с чемпионатом
    # print("Связываю команды с чемпионатом...")
    # championship_teams = [
    #     ChampionshipTeams(championship_id=championship.id, team_id=teams[0].id),
    #     ChampionshipTeams(championship_id=championship.id, team_id=teams[1].id),
    #     ChampionshipTeams(championship_id=championship.id, team_id=teams[2].id),
    #     ChampionshipTeams(championship_id=championship.id, team_id=teams[3].id),
    #     ChampionshipTeams(championship_id=championship.id, team_id=teams[4].id),
    # ]
    # session.add_all(championship_teams)
    # await session.flush()

    # # Связываем игроков с командами в чемпионате
    # print("Связываю игроков с командами в чемпионате...")
    # championship_players = []
    # player_idx = 0
    # for team_idx, team in enumerate(teams):
    #     for i in range(5):  # По 5 игроков на команду
    #         if player_idx < len(players):
    #             cp = ChampionshipPlayers(
    #                 championship_id=championship.id,
    #                 team_id=team.id,
    #                 player_id=players[player_idx].id,
    #                 number=i + 1,
    #                 matches=2 if i < 3 else 1,
    #                 goals=i * 2,
    #                 assists=i,
    #                 penalties=0,
    #             )
    #             championship_players.append(cp)
    #             player_idx += 1
    # session.add_all(championship_players)
    # await session.flush()

    # # Связываем игры с чемпионатом
    # print("Связываю игры с чемпионатом...")
    # championship_games = [
    #     ChampionshipGames(championship_id=championship.id, game_id=games[0].id),
    #     ChampionshipGames(championship_id=championship.id, game_id=games[1].id),
    #     ChampionshipGames(championship_id=championship.id, game_id=games[2].id),
    #     ChampionshipGames(championship_id=championship.id, game_id=games[3].id),
    #     ChampionshipGames(championship_id=championship.id, game_id=games[4].id),
    # ]
    # session.add_all(championship_games)
    # await session.flush()

    # Создаём турнир
    print("Создаю турнир...")
    tournament = Tournament(
        name="Предсезонный турнир",
        start_date=date(2025, 9, 9),
        end_date=date(2025, 10, 14),
        location="СК «Торпедо»",
    )
    session.add(tournament)
    await session.flush()
    print("Турнир создан")

    # Связываем команды с турниром
    print("Связываю команды с турниром...")
    tournament_teams = [
        TournamentTeams(tournament_id=tournament.id, team_id=teams[0].id),
        TournamentTeams(tournament_id=tournament.id, team_id=teams[1].id),
        TournamentTeams(tournament_id=tournament.id, team_id=teams[2].id),
        TournamentTeams(tournament_id=tournament.id, team_id=teams[3].id),
        TournamentTeams(tournament_id=tournament.id, team_id=teams[4].id),
        TournamentTeams(tournament_id=tournament.id, team_id=teams[5].id),
    ]
    session.add_all(tournament_teams)
    await session.flush()

    # Связываем игроков с командами в турнире
    print("Связываю игроков с командами в турнире...")
    tournament_players = []
    player_idx = 0
    # Только для команд, которые участвуют в турнире (0, 2, 3, 4)
    tournament_team_indices = [0, 2, 3, 4]
    for team_idx in tournament_team_indices:
        team = teams[team_idx]
        # Берем игроков, которые уже есть в этих командах
        start_player_idx = team_idx * 5
        for i in range(5):
            if start_player_idx + i < len(players):
                tp = TournamentPlayers(
                    tournament_id=tournament.id,
                    team_id=team.id,
                    player_id=players[start_player_idx + i].id,
                    number=i + 1,
                    matches=1,
                    goals=i,
                    assists=0,
                    penalties=0,
                )
                tournament_players.append(tp)
    session.add_all(tournament_players)
    await session.flush()

    # Связываем игры с турниром
    print("Связываю игры с турниром...")
    tournament_games = [
        TournamentGames(tournament_id=tournament.id, game_id=games[0].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[1].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[2].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[3].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[4].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[5].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[6].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[7].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[8].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[9].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[10].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[11].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[12].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[13].id),
        TournamentGames(tournament_id=tournament.id, game_id=games[14].id),
    ]
    session.add_all(tournament_games)
    await session.flush()

    # Пересчитываем статистику команд после добавления игр
    print("Пересчитываю статистику команд...")
    from app.services import championship_service, tournament_service
    # await championship_service.recalculate_championship_teams_stats(session, championship.id, None)
    await tournament_service.recalculate_tournament_teams_stats(session, tournament.id, None)

    await session.commit()
    print("\n✅ Все данные успешно заполнены!")
    print(f"\n📊 Статистика:")
    print(f"   - Команд: {len(teams)}")
    print(f"   - Игроков: {len(players)}")
    print(f"   - Игр: {len(games)}")
    # print(f"   - Чемпионатов: 1")
    print(f"   - Турниров: 1")
    # print(f"   - Связей команда-чемпионат: {len(championship_teams)}")
    # print(f"   - Связей игрок-команда-чемпионат: {len(championship_players)}")
    # print(f"   - Связей игра-чемпионат: {len(championship_games)}")
    print(f"   - Связей команда-турнир: {len(tournament_teams)}")
    print(f"   - Связей игрок-команда-турнир: {len(tournament_players)}")
    print(f"   - Связей игра-турнир: {len(tournament_games)}")


async def clear_data(session: AsyncSession):
    """Очищает все данные (опционально)"""
    from sqlalchemy import delete
    from app.db.models import (
        ChampionshipTeams,
        ChampionshipPlayers,
        ChampionshipGames,
        TournamentTeams,
        TournamentPlayers,
        TournamentGames,
        Championship,
        Tournament,
        Game,
        Player,
        Team,
    )
    
    print("Очищаю данные...")
    await session.execute(delete(ChampionshipTeams))
    await session.execute(delete(ChampionshipPlayers))
    await session.execute(delete(ChampionshipGames))
    await session.execute(delete(TournamentTeams))
    await session.execute(delete(TournamentPlayers))
    await session.execute(delete(TournamentGames))
    await session.execute(delete(Championship))
    await session.execute(delete(Tournament))
    await session.execute(delete(Game))
    await session.execute(delete(Player))
    await session.execute(delete(Team))
    await session.commit()
    print("Данные очищены")


if __name__ == "__main__":
    asyncio.run(seed_data())

