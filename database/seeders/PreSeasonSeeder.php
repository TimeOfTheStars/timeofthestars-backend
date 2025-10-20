<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentGame;
use App\Models\TournamentPlayer;
use App\Models\TournamentTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreSeasonSeeder extends Seeder
{
    public function run(): void
    {
        $predsezon = Tournament::where('name', 'Предсезонный турнир')->first()->id;

        $pereslavl = Team::where('name', 'СХК Переславль-Залесский')->first()->id;
        $zubr = Team::where('name', 'ХК Зубр')->first()->id;
        $vympelV = Team::where('name', 'ХК Вымпел-V')->first()->id;
        $yaroslavich = Team::where('name', 'ХК Ярославич')->first()->id;
        $torpedo = Team::where('name', 'ХК Торпедо')->first()->id;
        $bgv = Team::where('name', 'ХК БГВ')->first()->id;

        $tournamentGames = [
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $yaroslavich)
                    ->where('team_b_id', $zubr)
                    ->where('date', '2025-09-09')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $torpedo)
                    ->where('team_b_id', $vympelV)
                    ->where('date', '2025-09-10')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $pereslavl)
                    ->where('team_b_id', $bgv)
                    ->where('date', '2025-09-12')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $yaroslavich)
                    ->where('team_b_id', $torpedo)
                    ->where('date', '2025-09-16')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $vympelV)
                    ->where('team_b_id', $bgv)
                    ->where('date', '2025-09-17')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $pereslavl)
                    ->where('team_b_id', $zubr)
                    ->where('date', '2025-09-19')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $zubr)
                    ->where('team_b_id', $vympelV)
                    ->where('date', '2025-09-23')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $torpedo)
                    ->where('team_b_id', $bgv)
                    ->where('date', '2025-09-24')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $vympelV)
                    ->where('team_b_id', $yaroslavich)
                    ->where('date', '2025-09-30')
                    ->first()->id,
            ],

            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $zubr)
                    ->where('team_b_id', $bgv)
                    ->where('date', '2025-10-01')
                    ->first()->id,
            ],

            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $pereslavl)
                    ->where('team_b_id', $torpedo)
                    ->where('date', '2025-10-03')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $yaroslavich)
                    ->where('team_b_id', $bgv)
                    ->where('date', '2025-10-07')
                    ->first()->id,
            ],

            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $pereslavl)
                    ->where('team_b_id', $vympelV)
                    ->where('date', '2025-10-08')
                    ->first()->id,
            ],

            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $zubr)
                    ->where('team_b_id', $torpedo)
                    ->where('date', '2025-10-10')
                    ->first()->id,
            ],
            [
                'tournament_id' => $predsezon,
                'game_id' => Game::where('team_a_id', $yaroslavich)
                    ->where('team_b_id', $pereslavl)
                    ->where('date', '2025-10-14')
                    ->first()->id,
            ],
        ];

        $teams = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
            ]
        ];

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
                'number' => 82,
                'gaa' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Комаров Максим')->first()->id,
                'number' => 2,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Морин Илья')->first()->id,
                'number' => 4,
                'goals' => 1,
                'penalties' => 0,
                'matches' => 1,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Выдряков Роман')->first()->id,
                'number' => 11,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
                'assists' => 2,
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
                'number' => 81,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гречухин Александр')->first()->id,
                'number' => 17,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гусев Матвей')->first()->id,
                'number' => 9,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Ларионов Павел ст.')->first()->id,
                'number' => 77,
                'assists' => 1,
                'penalties' => 1,
                'goals' => 3,
                'matches' => 2,
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
                'player_id' => Player::where('full_name', 'Смирнов Михаил')->first()->id,
                'number' => 11,
                'goals' => 2,
                'assists' => 4,
                'penalties' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Прокопенко Ярослав')->first()->id,
                'number' => 96,
                'goals' => 2,
                'assists' => 2,
                'penalties' => 1,
                'matches' => 2,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Авагян Ашот')->first()->id,
                'number' => 17,
                'goals' => 1,
                'assists' => 2,
                'penalties' => 0,
                'matches' => 1,
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
                'number' => 8,
                'goals' => 4,
                'assists' => 4,
                'penalties' => 1,
                'matches' => 2,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Выдряков Вячеслав')->first()->id,
                'number' => 61,
                'goals' => 2,
                'assists' => 2,
                'penalties' => 0,
                'matches' => 2,
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
                'number' => 13,
                'goals' => 0,
                'assists' => 1,
                'penalties' => 0,
                'matches' => 1,
            ],
            //----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Хисамутдинов Роман')->first()->id,
                'number' => 91,
                'goals' => 4,
                'assists' => 8,
                'penalties' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Цепков Максим')->first()->id,
                'number' => 12,
                'goals' => 1,
                'assists' => 0,
                'penalties' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Мокшанцев Александр')->first()->id,
                'number' => 25,
                'goals' => 1,
                'assists' => 5,
                'penalties' => 0,
                'matches' => 2,
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
                'number' => 80,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Щербаков Максим')->first()->id,
                'number' => 23,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Пасынков Александр')->first()->id,
                'number' => 72,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Никулин Семен')->first()->id,
                'number' => 81,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Павлов Леонид')->first()->id,
                'number' => 44,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 3,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Собенин Даниил')->first()->id,
                'number' => 10,
                'assists' => 1,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кривенко Даниил')->first()->id,
                'number' => 69,
                'penalties' => 1,
                'assists' => 1,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кошелев Александр')->first()->id,
                'number' => 14,
                'assists' => 0,
                'penalties' => 2,
                'goals' => 0,
                'matches' => 3,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сон Александр')->first()->id,
                'number' => 51,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ардашев Дмитрий')->first()->id,
                'number' => 43,
                'assists' => 0,
                'penalties' => 3,
                'goals' => 1,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ардашев Кирилл')->first()->id,
                'number' => 9,
                'goals' => 2,
                'assists' => 1,
                'penalties'=>2,
                'matches' => 2,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сорокин Артем')->first()->id,
                'number' => 15,
                'goals' => 2,
                'assists' => 1,
                'penalties' => 2,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ершов Иван')->first()->id,
                'number' => 98,
                'goals' => 3,
                'assists' => 2,
                'penalties' => 0,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Данилов Иван')->first()->id,
                'number' => 22,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Бондырев Игорь')->first()->id,
                'number' => 43,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кривенко Артем')->first()->id,
                'number' => 37,
                'goals' => 1,
                'assists' => 0,
                'penalties' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Веселовский Роман')->first()->id,
                'number' => 5,
                'assists' => 1,
                'goals' => 1,
                'penalties' => 0,
                'matches' => 2,
            ],
            //---------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ахметов Тимур')->first()->id,
                'number' => 88,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Стручинский Виктор')->first()->id,
                'number' => 97,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ухарский Андрей')->first()->id,
                'number' => 33,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Пасечник Никита')->first()->id,
                'number' => 61,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Величко Глеб')->first()->id,
                'number' => 4,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кузнецов Даниил')->first()->id,
                'number' => 31,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
                'gaa'=>2,
            ],
        ];

        $vympelvPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Шарпанов Виктор')->first()->id,
                'number' => 1,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бардин Даниил')->first()->id,
                'number' => 55,
                'assists' => 2,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Кокарев Александр')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Пульников Илья')->first()->id,
                'number' => 38,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Грибков Илья')->first()->id,
                'number' => 36,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Фролов Матвей')->first()->id,
                'number' => 81,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 2,
                'matches' => 2,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Петров Илья')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лебедев Александр')->first()->id,
                'number' => 23,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лысых Илья')->first()->id,
                'number' => 48,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 4,
                'matches' => 3,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лямин Семен')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Белоусов Анатолий')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бычков Егор')->first()->id,
                'number' => 57,
                'assists' => 0,
                'penalties' => 2,
                'goals' => 1,
                'matches' => 3,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Волохов Александр')->first()->id,
                'number' => 59,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 2,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Игнатьев Кирилл')->first()->id,
                'number' => 52,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 2,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Сагимбаев Мерген')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Смирнов Даниил')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Тельцов Иван')->first()->id,
                'number' => 96,
                'assists' => 3,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Тимофеев Дмитрий')->first()->id,
                'number' => 80,
                'assists' => 5,
                'penalties' => 0,
                'goals' => 3,
                'matches' => 3,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Уткин Дмитрий')->first()->id,
                'number' => 44,
                'assists' => 4,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Шайтанов Александр')->first()->id,
                'number' => 32,
                'assists' => 1,
                'penalties' => 3,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Свешников Вячеслав')->first()->id,
                'number' => 93,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Кардышев Владислав')->first()->id,
                'number' => 2,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
                'gaa'=>3,
            ],
        ];

        $yaroslavichPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Созонов Юрий')->first()->id,
                'number' => 1,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
                'gaa'=>3,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Тихонов Ярослав')->first()->id,
                'number' => 33,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
                'gaa'=>8,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Шведов Константин')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Паутов Александр')->first()->id,
                'number' => 17,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Сарычев Никита')->first()->id,
                'number' => 42,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Ященин Савелий')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Красильников Георгий')->first()->id,
                'number' => 45,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Вельс Григорий')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Клёмин Владимир')->first()->id,
                'number' => 63,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Чумаков Архип')->first()->id,
                'number' => 68,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Товстый Александр')->first()->id,
                'number' => 28,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Зашивалов Даниил')->first()->id,
                'number' => 11,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Нежданов Игорь')->first()->id,
                'number' => 29,
                'assists'=> 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Золотов Тихан')->first()->id,
                'number' => 31,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Шилов Никита')->first()->id,
                'number' => 39,
                'assists'=> 2,
                'penalties' => 0,
                'goals' => 3,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Афанасьев Артем')->first()->id,
                'number' => 67,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Левченко Владислав')->first()->id,
                'number' => 77,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Федотов Георгий')->first()->id,
                'number' => 88,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Воронин Тимофей')->first()->id,
                'number' => 91,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Смирнов Илья')->first()->id,
                'number' => 94,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            //--------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Зубов Матвей')->first()->id,
                'number' => 99,
                'goals' => 3,
                'assists' => 0,
                'penalties' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Божедомов Михаил')->first()->id,
                'number' => 34,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
//            [
//                'tournament_id' => $predsezon,
//                'team_id' => $yaroslavich,
//                'player_id' => Player::where('full_name', 'Клёмин Владимир')->first()->id,
//                'number' => 69,
//                'assists' => 0,
//                'penalties' => 0,
//                'goals' => 0,
//                'matches' => 1,
//            ],
        ];

        $torpedoPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Чеблоков Даниил')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тихонов Антон')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тумаков Иван')->first()->id,
                'number' => 35,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
                'gaa' => 9
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Пеньков Никита')->first()->id,
                'number' => 31,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Казаков Даниил')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Зазнобин Егор')->first()->id,
                'number' => 71,
                'assists' => 1,
                'penalties' => 2,
                'goals' => 0,
                'matches' => 2,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Челин Павел')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Голубев Владимир')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Иванов Тихон')->first()->id,
                'number' => 95,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кравчук Егор')->first()->id,
                'number' => 73,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Белавский Дмитрий')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Ткаченко Никита')->first()->id,
                'number' => 97,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Крюков Даниил')->first()->id,
                'number' => 12,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 2,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Марков Андрей')->first()->id,
                'number' => 79,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Морозов Иван')->first()->id,
                'number' => 27,
                'assists' => 0,
                'penalties' => 2,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Медведев Георгий')->first()->id,
                'number' => 8,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Шушин Даниил')->first()->id,
                'number' => 96,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 2,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Шлыков Егор')->first()->id,
                'number' => 97,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Седов Егор')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Железняков Мирослав')->first()->id,
                'number' => 7,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Камушков Клим')->first()->id,
                'number' => 2,
                'assists' => 2,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Савченко Павел')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Заблоцкий Евгений')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тельман Евгений')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Чванчиков Андрей')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кустов Даниил')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Орлов Илья')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кулешов Владислав')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //-------------------------------------
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Воробьев Владислав')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Малетин Илья')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Пятаков Алексей')->first()->id,
                'number' => 98,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Жилов Сергей')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Таганчиков Сергей')->first()->id,
                'number' => 86,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Трунов Сергей')->first()->id,
                'number' => 2,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Идрисов Камиль')->first()->id,
                'number' => 27,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
        ];

        $bgvPlayers = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Тимошенко Алексей')->first()->id,
                'number' => 55,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лемеза Вадим')->first()->id,
                'number' => 50,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Канаев Даниил')->first()->id,
                'number' => 12,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Мосолов Николай')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Ларюхин Владислав')->first()->id,
                'number' => 13,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Туркин Владислав')->first()->id,
                'number' => 88,
                'assists' => 1,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Тонков Никита')->first()->id,
                'number' => 12,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Пушков Павел')->first()->id,
                'number' => 13,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Григоренко Ярослав')->first()->id,
                'number' => 55,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Еремычев Матвей')->first()->id,
                'number' => 41,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Слободянюк Максим')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Антипов Никита')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лисенчук Денис')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Шопыгин Даниил')->first()->id,
                'number' => 31,
                'goals' => 1,
                'assists' => 0,
                'penalties' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Зарубин Денис')->first()->id,
                'number' => 99,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Разживин Артем')->first()->id,
                'number' => 49,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Соколов Илья')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Голосов Егор')->first()->id,
                'number' => 99,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Новиков Антон')->first()->id,
                'number' => 88,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Васильев Максим')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лавров Дмитрий')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            //------
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Филиппов Илья')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Любимов Никита')->first()->id,
                'number' => 7,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Устинов Даниил')->first()->id,
                'number' => 47,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 2,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Шмелев Валерий')->first()->id,
                'number' => null,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 0,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Гусаров Александр')->first()->id,
                'number' => 49,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Цирюлин Никита')->first()->id,
                'number' => 75,
                'assists' => 1,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Корчоха Роберт')->first()->id,
                'number' => 88,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Воробьев Матвей')->first()->id,
                'number' => 5,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Лихарев Иван')->first()->id,
                'number' => 41,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 1,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Сагимбаев Мерген')->first()->id,
                'number' => 2,
                'assists' => 0,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Петров Илья')->first()->id,
                'number' => 5,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Маккшеев Олег')->first()->id,
                'number' => 42,
                'assists' => 1,
                'penalties' => 0,
                'goals' => 0,
                'matches' => 1,
            ],
            [
                'tournament_id' => $predsezon,
                'team_id' => $bgv,
                'player_id' => Player::where('full_name', 'Орехин Даниил')->first()->id,
                'number' => 77,
                'assists' => 3,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
        ];

        $otherPlayer = [
            [
                'tournament_id' => $predsezon,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Рачев Кирилл')->first()->id,
                'number' => 1,
                'assists' => 0,
                'penalties' => 1,
                'goals' => 0,
                'matches' => 1,
            ],
        ];

        foreach ($tournamentGames as $game) {
            TournamentGame::create($game);
        }
        echo "\n✅ Связь матчей с турниром настроена.\n\n";

        foreach ($teams as $team) {
            TournamentTeam::create($team);
        }
        echo "✅ Связь матчей с командами настроена.\n\n";

        foreach ($pereslavlPlayers as $player) {
            TournamentPlayer::create($player);
        }
        echo "✅ Команда Переславль заполнена.\n\n";

        foreach ($zubrPlayers as $player) {
            TournamentPlayer::create($player);
        }
        echo "✅ Команда Зубр заполнена.\n\n";

        foreach ($vympelvPlayers as $player) {
            TournamentPlayer::create($player);
        }
        echo "✅ Команда Вымпел-V заполнена.\n\n";

        foreach ($yaroslavichPlayers as $player) {
            TournamentPlayer::create($player);
        }
        echo "✅ Команда Ярославич заполнена.\n\n";

        foreach ($torpedoPlayers as $player) {
            TournamentPlayer::create($player);
        }
        echo "✅ Команда Торпедо заполнена.\n\n";

        foreach ($bgvPlayers as $player) {
            TournamentPlayer::create($player);
        }
        echo "✅ Команда БГВ заполнена.\n\n";

        foreach ($otherPlayer as $player) {
            Player::create($player);
        }
        echo "✅ Дополнительные игроки заполнены\n\n";
    }
}
