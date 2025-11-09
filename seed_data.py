import asyncio
from datetime import date, time, timedelta
from sqlalchemy.future import select

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
        # Команда Ярославич
        {"full_name": "Созонов Юрий", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Тихонов Ярослав", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Шведов Константин", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Паутов Александр", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Сарычев Никита", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Ященин Савелий", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Красильников Георгий", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Вельс Григорий", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Клёмин Владимир", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Чумаков Архип", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Товстый Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Зашивалов Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Нежданов Игорь", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Золотов Тихан", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Шилов Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Афанасьев Артем", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Левченко Владислав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Федотов Георгий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Воронин Тимофей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Смирнов Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Зубов Матвей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Божедомов Михаил", "birth_date": None, "position": "защитник", "grip": None},

        # Команда Торпедо
        {"full_name": "Чеблоков Даниил", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Тихонов Антон", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Тумаков Иван", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Пеньков Никита", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Казаков Даниил", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Зазнобин Егор", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Челин Павел", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Голубев Владимир", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Иванов Тихон", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Кравчук Егор", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Белавский Дмитрий", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Ткаченко Никита", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Крюков Даниил", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Марков Андрей", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Морозов Иван", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Медведев Георгий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Шушин Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Шлыков Егор", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Седов Егор", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Железняков Мирослав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Камушков Клим", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Савченко Павел", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Заблоцкий Евгений", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Тельман Евгений", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Чванчиков Андрей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Кустов Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Орлов Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Кулешов Владислав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Воробьев Владислав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Малетин Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Пятаков Алексей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Жилов Сергей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Таганчиков Сергей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Трунов Сергей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Идрисов Камиль", "birth_date": None, "position": "защитник", "grip": None},

        # Команда Переславль
        {"full_name": "Безменов Егор", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Шиляев Даниил", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Киселев Никита", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Королев Александр", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Комаров Максим", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Морин Илья", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Выдряков Роман", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Козлов Михаил", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Мельников Андрей", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Гречухин Александр", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Гусев Матвей", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Ларионов Павел ст.", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Ларионов Павел мл.", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Смирнов Михаил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Прокопенко Ярослав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Авагян Ашот", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Гуров Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Савельев Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Выдряков Вячеслав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Жуков Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Кузнецов Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Хисамутдинов Роман", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Цепков Максим", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Мокшанцев Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Банников Матвей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Киселев Владислав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Сударев Кирилл", "birth_date": None, "position": "нападающий", "grip": None},

        # Команда Зубр
        {"full_name": "Бархаткин Артем", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Щербаков Максим", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Пасынков Александр", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Никулин Семен", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Павлов Леонид", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Собенин Даниил", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Кривенко Даниил", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Кошелев Александр", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Сон Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Ардашев Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Ардашев Кирилл", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Сорокин Артем", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Ершов Иван", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Данилов Иван", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Бондырев Игорь", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Кривенко Артем", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Веселовский Роман", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Ахметов Тимур", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Стручинский Виктор", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Ухарский Андрей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Пасечник Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Величко Глеб", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Кузнецов Даниил", "birth_date": None, "position": "вратарь", "grip": None},

        # Команда Вымпел-V
        {"full_name": "Шарпанов Виктор", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Бардин Даниил", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Кокарев Александр", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Пульников Илья", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Грибков Илья", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Фролов Матвей", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Петров Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Лебедев Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Лысых Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Лямин Семен", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Белоусов Анатолий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Бычков Егор", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Волохов Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Игнатьев Кирилл", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Сагимбаев Мерген", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Смирнов Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Тельцов Иван", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Тимофеев Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Уткин Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Шайтанов Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Свешников Вячеслав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Кардышев Владислав", "birth_date": None, "position": "вратарь", "grip": None},

        # Команда БГВ
        {"full_name": "Тимошенко Алексей", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Лемеза Вадим", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Канаев Даниил", "birth_date": None, "position": "вратарь", "grip": None},
        {"full_name": "Мосолов Николай", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Ларюхин Владислав", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Туркин Владислав", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Тонков Никита", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Пушков Павел", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Григоренко Ярослав", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Еремычев Матвей", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Слободянюк Максим", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Антипов Никита", "birth_date": None, "position": "защитник", "grip": None},
        {"full_name": "Лисенчук Денис", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Шопыгин Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Зарубин Денис", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Разживин Артем", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Соколов Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Голосов Егор", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Новиков Антон", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Васильев Максим", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Лавров Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Филиппов Илья", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Любимов Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Устинов Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Шмелев Валерий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Гусаров Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Цирюлин Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Корчоха Роберт", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Воробьев Матвей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Лихарев Иван", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Маккшеев Олег", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Орехин Даниил", "birth_date": None, "position": "нападающий", "grip": None},

        #Другие
        {"full_name": "Рачев Кирилл", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Каданцев Елисей", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Морозов Игорь", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Леонов Даниил", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Казакевич Евгений", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Лихачев Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Дмитриев Артем", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Макшеев Олег", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Евдокимов Вячеслав", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Олин Лев", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Казунин Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Герасимов Артем", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Цирулёв Никита", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Казаков Иван", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Идиатуллин Александр", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Козулин Дмитрий", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Макар Денис", "birth_date": None, "position": "нападающий", "grip": None},
        {"full_name": "Анохин Артём", "birth_date": None, "position": "нападающий", "grip": None},
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
    print("Создаю чемпионат...")
    championship = Championship(
        name="Звезда Отечества",
        start_date=date(2025, 10, 21),
        location="СК «Торпедо», ГУОР, СК «Переславль»",
    )
    session.add(championship)
    await session.flush()
    print("Чемпионат создан")

    # Связываем команды с чемпионатом
    print("Связываю команды с чемпионатом...")
    championship_teams = [
        ChampionshipTeams(championship_id=championship.id, team_id=teams[0].id),
        ChampionshipTeams(championship_id=championship.id, team_id=teams[1].id),
        ChampionshipTeams(championship_id=championship.id, team_id=teams[3].id),
        ChampionshipTeams(championship_id=championship.id, team_id=teams[4].id),
        ChampionshipTeams(championship_id=championship.id, team_id=teams[5].id),
        ChampionshipTeams(championship_id=championship.id, team_id=teams[6].id),
        ChampionshipTeams(championship_id=championship.id, team_id=teams[7].id),
    ]
    session.add_all(championship_teams)
    await session.flush()

    # Связываем игроков с командами в чемпионате
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

    # Связываем игры с чемпионатом
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
    # tournament_players = [
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Безменов Егор').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Шиляев Даниил').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Киселев Никита').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Королев Александр').first().id, 'number': 82, 'gaa': 1, 'penalties': 0, 'goals': 0, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Комаров Максим').first().id, 'number': 2, 'penalties': 0, 'goals': 0, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Морин Илья').first().id, 'number': 4, 'goals': 1, 'penalties': 0, 'matches': 3, 'assists': 2},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Выдряков Роман').first().id, 'number': 11, 'penalties': 0, 'goals': 0, 'matches': 1, 'assists': 2},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Козлов Михаил').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Мельников Андрей').first().id, 'number': 81, 'assists': 2, 'penalties': 0, 'goals': 1, 'matches': 2},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Гречухин Александр').first().id, 'number': 17, 'assists': 0, 'penalties': 0, 'goals': 1, 'matches': 3},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Гусев Матвей').first().id, 'number': 9, 'assists': 3, 'penalties': 2, 'goals': 0, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Ларионов Павел ст.').first().id, 'number': 77, 'assists': 1, 'penalties': 1, 'goals': 3, 'matches': 2},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Ларионов Павел мл.').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Смирнов Михаил').first().id, 'number': 11, 'goals': 3, 'assists': 4, 'penalties': 1, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Прокопенко Ярослав').first().id, 'number': 96, 'goals': 4, 'assists': 2, 'penalties': 1, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Авагян Ашот').first().id, 'number': 17, 'goals': 1, 'assists': 2, 'penalties': 0, 'matches': 3},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Гуров Александр').first().id, 'number': 69, 'goals': 0, 'assists': 0, 'penalties': 0, 'matches': 1},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Савельев Никита').first().id, 'number': 8, 'goals': 4, 'assists': 4, 'penalties': 1, 'matches': 3},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Выдряков Вячеслав').first().id, 'number': 61, 'goals': 2, 'assists': 2, 'penalties': 0, 'matches': 3},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Жуков Никита').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Кузнецов Дмитрий').first().id, 'number': 13, 'goals': 2, 'assists': 3, 'penalties': 0, 'matches': 3},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Хисамутдинов Роман').first().id, 'number': 91, 'goals': 4, 'assists': 9, 'penalties': 0, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Цепков Максим').first().id, 'number': 12, 'goals': 1, 'assists': 0, 'penalties': 0, 'matches': 1},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Мокшанцев Александр').first().id, 'number': 25, 'goals': 3, 'assists': 9, 'penalties': 0, 'matches': 4},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Банников Матвей').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Киселев Владислав').first().id, 'number': None},
    #     {'tournament_id': tournament.id, 'team_id': teams[0].id, 'player_id': Player.objects.filter(full_name='Сударев Кирилл').first().id, 'number': None},
    # ]
    # session.add_all(tournament_players)
    # await session.flush()

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
    await championship_service.recalculate_championship_teams_stats(session, championship.id, None)
    await tournament_service.recalculate_tournament_teams_stats(session, tournament.id, None)

    await session.commit()
    print("\n✅ Все данные успешно заполнены!")
    print(f"\n📊 Статистика:")
    print(f"   - Команд: {len(teams)}")
    print(f"   - Игроков: {len(players)}")
    print(f"   - Игр: {len(games)}")
    print(f"   - Чемпионатов: 1")
    print(f"   - Турниров: 1")
    print(f"   - Связей команда-чемпионат: {len(championship_teams)}")
    # print(f"   - Связей игрок-команда-чемпионат: {len(championship_players)}")
    # print(f"   - Связей игра-чемпионат: {len(championship_games)}")
    print(f"   - Связей команда-турнир: {len(tournament_teams)}")
    # print(f"   - Связей игрок-команда-турнир: {len(tournament_players)}")
    print(f"   - Связей игра-турнир: {len(tournament_games)}")


async def clear_data(session: AsyncSession):
    """Очищает все данные (опционально)"""
    from sqlalchemy import delete
    from app.db.models import (
        ChampionshipTeams,
        # ChampionshipPlayers,
        # ChampionshipGames,
        TournamentTeams,
        # TournamentPlayers,
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

