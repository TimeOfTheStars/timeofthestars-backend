<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TournamentPlayer;
use App\Models\Player;

class TournamentPlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $predsezon = Tournament::where('name', 'Предсезонный турнир')->first()->id;

        $pereslavl = Team::where('name', 'ХК Переславль')->first()->id;
        $zubr = Team::where('name', 'ХК Зубр')->first()->id;
        $vympelV = Team::where('name', 'ХК Вымпел-V')->first()->id;
        $yaroslavich = Team::where('name', 'ХК Ярославич')->first()->id;
        $torpedo = Team::where('name', 'ХК Торпедо')->first()->id;
        $bgv = Team::where('name', 'ХК БГВ')->first()->id;

        $pereslavlPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Безменов Егор')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Шиляев Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Киселев Никита')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Королев Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Комаров Максим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Морин Илья')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Выдряков Роман')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Козлов Михаил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Мельников Андрей')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гречухин Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гусев Матвей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Ларионов Павел ст.')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Ларионов Павел мл.')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Смирнов Максим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Прокопенко Ярослав')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Авагян Ашот')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гуров Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Савельев Никита')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Выдряков Вячеслав')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Жуков Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Кузнецов Дмитрий')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Хисамутдинов Роман')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Цепков Максим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Мокшанцев Александр')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Банников Матвей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Киселев Владислав')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Сударев Кирилл')->first()->id,
                'number' => null,
            ],
        ];

        $zubrPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Бархаткин Артем')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Щербаков Максим')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Пасынков Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Никулин Семен')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Павлов Леонид')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Собенин Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кривенко Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кошелев Александр')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сон Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ардашев Дмитрий')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ардашев Кирилл')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сорокин Артем')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ершов Иван')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Данилов Иван')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Бондырев Игорь')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кривенко Артем')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Веселовский Роман')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ахметов Тимур')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Стручинский Виктор')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ухарский Андрей')->first()->id,
                'number' => null,
            ],
        ];

        $vympelvPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Шарпанов Виктор')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бардин Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Кокарев Александр')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Пульников Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Грибков Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Фролов Матвей')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Петров Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лебедев Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лысых Илья')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лямин Семен')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Белоусов Анатолий')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бычков Егор')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Волохов Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Игнатьев Кирилл')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Сагимбаев Мерген')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Смирнов Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Тельцов Иван')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Тимофеев Дмитрий')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Уткин Дмитрий')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Шайтанов Александр')->first()->id,
                'number' => null,
            ],
        ];

        $yaroslavichPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Созонов Юрий')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Тихонов Ярослав')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Шведов Константин')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Паутов Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Сарычев Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Ященин Савелий')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Клемин Владимир')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Чумаков Архип')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Товстый Александр')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Зашивалов Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Нежданов Игорь')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Золотов Тихан')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Шилов Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Афанасьев Артем')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Левченко Владислав')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Федотов Георгий')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Воронин Тимофей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Смирнов Илья')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Зубов Матвей')->first()->id,
                'number' => null,
            ],
        ];

        $torpedoPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Чеблоков Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тихонов Антон')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тумаков Иван')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Пеньков Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Казаков Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Зазнобин Егор')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Челин Павел')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Голубев Владимир')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Иванов Тихон')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кравчук Егор')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Белавский Дмитрий')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Ткаченко Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Крюков Даниил')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Марков Андрей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Морозов Иван')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Медведев Георгий')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Шушин Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Шлыков Егор')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Седов Егор')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Железняков Мирослав')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Камушков Клим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Савченко Павел')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Заблоцкий Евгений')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тельман Евгений')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Чванчиков Андрей')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кустов Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Орлов Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кулешов Владислав')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Воробьев Владислав')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Малетин Илья')->first()->id,
                'number' => null,
            ],
        ];

        $bgvPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Тимошенко Алексей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лемеза Вадим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Канаев Даниил')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Мосолов Николай')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Ларюхин Владислав')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Туркин Владислав')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Тонков Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Пушков Павел')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Григоренко Ярослав')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Еремычев Матвей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Слободянюк Максим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Антипов Никита')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лисенчук Денис')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Шопыгин Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Зарубин Денис')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Разживин Артем')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Соколов Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Голосов Егор')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Новиков Антон')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Васильев Максим')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лавров Дмитрий')->first()->id,
                'number' => null,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Филиппов Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Любимов Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Устинов Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Шмелев Валерий')->first()->id,
                'number' => null,
            ],
        ];

        foreach ($pereslavlPlayers as $player) {
            TournamentPlayer::create($player);
        }

        foreach ($zubrPlayers as $player) {
            TournamentPlayer::create($player);
        }

        foreach ($vympelvPlayers as $player) {
            TournamentPlayer::create($player);
        }

        foreach ($yaroslavichPlayers as $player) {
            TournamentPlayer::create($player);
        }

        foreach ($torpedoPlayers as $player) {
            TournamentPlayer::create($player);
        }

        foreach ($bgvPlayers as $player) {
            TournamentPlayer::create($player);
        }
    }
}
