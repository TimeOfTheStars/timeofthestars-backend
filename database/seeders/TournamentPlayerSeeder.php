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
        $tovarischesky = Tournament::where('name', 'Товарищеский турнир')->first()->id;

        $pereslavl = Team::where('name', 'ХК Переславль')->first()->id;
        $zubr = Team::where('name', 'ХК Зубр')->first()->id;
        $vympelV = Team::where('name', 'ХК Вымпел-V')->first()->id;
        $yaroslavich = Team::where('name', 'ХК Ярославич')->first()->id;
        $torpedo = Team::where('name', 'ХК Торпедо')->first()->id;

        $pereslavlPlayers = [
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Прокопенко Ярослав Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Авагян Ашот Гнелович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Уханов Сергей Дмитриевич')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Щербаков Тимур Павлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Шевцов Владимир Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Паськов Александр Владимирович')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Савенков Павел Денисович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Морин Илья Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Ардашев Дмитрий Алексеевич')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Королев Александр Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Плаонов Павел Андреевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Ларионов Павел Сергеевич')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Макшеев Олег Андреевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Жуков Никита Юрьевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Борисов Степан Алексеевич')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Выдряков Вячеслав Иванович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Смирнов Михаил Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Безменов Егор Юрьевич')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Султанов Кирилл Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Комаров Максим Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Ленков Максим Сергеевич')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Хасамутдинов Роман')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гуров Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Тимофеев Дмитрий')->first()->id,
                'number' => null,
            ],
            //----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Мельников Андрей')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Гречихин Александр')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Савельев Никита')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $pereslavl,
                'player_id' => Player::where('full_name', 'Шинев Даниил')->first()->id,
                'number' => null,
            ],
        ];

        $zubrPlayers = [
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Бархаткин Артем Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Щербаков Максим Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Стручинский Виктор Олегович')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ухарский Андрей Вячеславович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Павлов Леонид Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сорокин Артём Тимурович')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ухарский Андрей Вячеславович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Павлов Леонид Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сорокин Артём Тимурович')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ершов Иван Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ахметов Тимур Сулейманович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Сон Александ Валерьевич')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Шикунов Григорий Викторович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Ардашев Кирилл Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Никулин Семён Витальевич')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Канавин Евгений Олегович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Данилов Иван Валерьевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Бондырев Игорь Евгеньевич')->first()->id,
                'number' => null,
            ],
            //---------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кошелев Александр Игоревич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Пасечник Никита Дмитриевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $zubr,
                'player_id' => Player::where('full_name', 'Кривенко Даниил')->first()->id,
                'number' => null,
            ],
        ];

        $vympelvPlayers = [
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Борисов Иван Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Рачев Кирилл Леонидович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Богунов Кирилл Сергеевич')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бычков Егор Григорьевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Фролов Матвей Михайлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лобатый Владислав Дмитриевич')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Лямин Семен Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Сокруто Даниил Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Смирнов Даниил Андреевич')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Белоусов Алексей Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Трунов Сергей Егорович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Орлов Дмитрий Александрович')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бирюков Арсений Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Александров Алексей Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Ладысов Сергей')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Бондарев Арсений Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Кораблев Матвей Михайлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Федяев Елисей Александрович')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Рощин Кирилл Дмитриевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Веселов Артур')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Волков Владислав Артемович')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Зарубин Денис Олегович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Леонов Даниил Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Мартынов Никита Сергеевич')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Грибков Илья Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Пылаев Никита Павлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Комаров Дмитрий Павлович')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Ионов Александр Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Колояр Илья')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Игнатьев Кирилл Максимович')->first()->id,
                'number' => null,
            ],
            //-----------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Шайтанов Александ Андреевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Зеленский Егор Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $vympelV,
                'player_id' => Player::where('full_name', 'Филипов Максим Алексеевич')->first()->id,
                'number' => null,
            ],
        ];

        $yaroslavichPlayers = [
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Аксенов Григорий Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Андреюк Иван Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Вельс Григорий Александрович')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Гавриленко Кирилл Григорьевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Золотарев Артем Андреевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Зубов Матвей Юрьевич')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Коротков Никита Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Котко Матвей Николаевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Кузнецов Степан Андреевич')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Клёмин Владимир Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Лукьянов Никита Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Любутов Кирилл Владимирович')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Максимычев Александр Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Идиатуллин Александр Вадимович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Паничев Семен Александрович')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Паутов Александ Павлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Прощин Роман Дмитриевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Тихонов Ярослав Александрович')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Федотов Георгий Максимович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Чесалов Алексей Дмитриевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Шилов Никита Сергеевич')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Яковлев Ярослав Павлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Лащенов Никита Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Юханов Дмитрий Александрович')->first()->id,
                'number' => null,
            ],
            //--------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Кузнецов Савелий Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Прощин Роман Дмитриевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Яркин Илья Юрьевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $yaroslavich,
                'player_id' => Player::where('full_name', 'Нутрихин Илья Владиславович')->first()->id,
                'number' => null,
            ],
        ];

        $torpedoPlayers = [
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Чеблоков Даниил Дмитриевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тихонов Антон Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Пульников Илья Алексеевич')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Медведев Георгий Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Шушин Даниил Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Шлыков Егор Васильевич')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Седов Егор Витальевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Железняков Мирослав Сергеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Камушков Клим Владимирович')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Ткаченко Никита Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Заблоцкий Евгений Алексеевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Мурадов Алаудин Алиханович')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Марков Андрей Михайлович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Никитин Станислав Андреевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Орлов Илья Александрович')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Челин Павел Николаевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Голубев Владимир Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Иванов Тихон Константинович')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Кравчук Егор Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Белавский Дмитрий Владимирович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Вакорин Дмитрий Витальевич')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тихомиров Даниил Ярославович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тумаков Иван Александрович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Казаков Даниил')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Буров Даниил')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Тельман Евгений')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Павлов Сергей')->first()->id,
                'number' => null,
            ],
            //-------------------------------------
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Аверьянов Алексей Андреевич')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Воробьев Владислав Олегович')->first()->id,
                'number' => null,
            ],
            [
                'tournament_id' => $tovarischesky,
                'team_id' => $torpedo,
                'player_id' => Player::where('full_name', 'Малетин Илья')->first()->id,
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
    }
}
