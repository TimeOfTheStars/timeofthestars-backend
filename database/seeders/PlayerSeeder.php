<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** ------------------- Переславль ------------------- **/
        Player::create([
            'full_name' => 'Прокопенко Ярослав Алексеевич',
            'birth_date' => '2006-09-02',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Авагян Ашот Гнелович',
            'birth_date' => '1992-10-06',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Уханов Сергей Дмитриевич',
            'birth_date' => '2002-11-26',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Щербаков Тимур Павлович',
            'birth_date' => '2007-04-06',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шевцов Владимир Владимирович',
            'birth_date' => '1975-02-15',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Паськов Александр Владимирович',
            'birth_date' => '2003-06-11',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Савенков Павел Денисович',
            'birth_date' => '1998-11-18',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Морин Илья Алексеевич',
            'birth_date' => '2000-03-21',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ардашев Дмитрий Алексеевич',
            'birth_date' => '1992-01-19',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Королев Александр Владимирович',
            'birth_date' => '2008-04-10',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Плаонов Павел Андреевич',
            'birth_date' => '2000-08-16',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ларионов Павел Сергеевич',
            'birth_date' => '1988-04-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Макшеев Олег Андреевич',
            'birth_date' => '2001-04-15',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Жуков Никита Юрьевич',
            'birth_date' => '1993-04-08',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Борисов Степан Алексеевич',
            'birth_date' => '2007-08-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Выдряков Вячеслав Иванович',
            'birth_date' => '2002-05-23',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Смирнов Михаил Сергеевич',
            'birth_date' => '2000-01-09',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Безменов Егор Юрьевич',
            'birth_date' => '1999-06-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Султанов Кирилл Сергеевич',
            'birth_date' => '2003-06-11',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Комаров Максим Алексеевич',
            'birth_date' => '1996-10-17',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ленков Максим Сергеевич',
            'birth_date' => '2005-10-10',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Хасамутдинов Роман',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Гуров Александр',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тимофеев Дмитрий',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Мельников Андрей',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Гречихин Александр',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Савельев Никита',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шинев Даниил',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /** ------------------- Зубр ------------------- **/
        Player::create([
            'full_name' => 'Бархаткин Артем Александрович',
            'birth_date' => '2006-04-17',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Щербаков Максим Александрович',
            'birth_date' => '1981-09-02',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Стручинский Виктор Олегович',
            'birth_date' => '1997-04-19',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ухарский Андрей Вячеславович',
            'birth_date' => '1987-09-27',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Павлов Леонид Алексеевич',
            'birth_date' => '1997-02-25',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Сорокин Артём Тимурович',
            'birth_date' => '2001-06-26',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ершов Иван Александрович',
            'birth_date' => '1997-06-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ахметов Тимур Сулейманович',
            'birth_date' => '2001-07-30',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Сон Александ Валерьевич',
            'birth_date' => '1985-02-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шикунов Григорий Викторович',
            'birth_date' => '2004-05-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ардашев Кирилл Александрович',
            'birth_date' => '1997-02-02',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Никулин Семён Витальевич',
            'birth_date' => '1994-10-06',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Канавин Евгений Олегович',
            'birth_date' => '2005-02-03',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Данилов Иван Валерьевич',
            'birth_date' => '1997-09-04',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Бондырев Игорь Евгеньевич',
            'birth_date' => '1997-06-04',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кошелев Александр Игоревич',
            'birth_date' => '1997-08-17',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Пасечник Никита Дмитриевич',
            'birth_date' => '2002-09-05',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кривенко Даниил',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /** ------------------- Вымпел-V ------------------- **/
        Player::create([
            'full_name' => 'Борисов Иван Александрович',
            'birth_date' => '2004-03-28',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Рачев Кирилл Леонидович',
            'birth_date' => '2004-10-30',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Богунов Кирилл Сергеевич',
            'birth_date' => '2003-05-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Бычков Егор Григорьевич',
            'birth_date' => '2003-05-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Фролов Матвей Михайлович',
            'birth_date' => '2003-12-01',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лобатый Владислав Дмитриевич',
            'birth_date' => '2006-10-16',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лямин Семен Сергеевич',
            'birth_date' => '2003-12-02',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Сокруто Даниил Алексеевич',
            'birth_date' => '2004-02-22',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Смирнов Даниил Андреевич',
            'birth_date' => '2003-09-09',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Белоусов Алексей Владимирович',
            'birth_date' => '2003-07-19',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Трунов Сергей Егорович',
            'birth_date' => '2003-04-22',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Орлов Дмитрий Александрович',
            'birth_date' => '1991-03-09',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Бирюков Арсений Алексеевич',
            'birth_date' => '2005-08-03',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Александров Алексей Алексеевич',
            'birth_date' => '2005-07-30',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ладысов Сергей',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Бондарев Арсений Сергеевич',
            'birth_date' => '1985-04-09',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кораблев Матвей Михайлович',
            'birth_date' => '2007-01-25',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Федяев Елисей Александрович',
            'birth_date' => '2007-08-17',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Рощин Кирилл Дмитриевич',
            'birth_date' => '2009-03-26',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Веселов Артур',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Волков Владислав Артемович',
            'birth_date' => '2007-10-31',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Зарубин Денис Олегович',
            'birth_date' => '1995-05-24',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Леонов Даниил Алексеевич',
            'birth_date' => '2006-12-10',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Мартынов Никита Сергеевич',
            'birth_date' => '2005-08-19',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Грибков Илья Сергеевич',
            'birth_date' => '2006-04-10',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Пылаев Никита Павлович',
            'birth_date' => '2006-02-20',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Комаров Дмитрий Павлович',
            'birth_date' => '2003-02-24',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ионов Александр Сергеевич',
            'birth_date' => '1994-03-17',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Колояр Илья',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Игнатьев Кирилл Максимович',
            'birth_date' => '2006-05-03',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шайтанов Александ Андреевич',
            'birth_date' => '2000-05-17',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Зеленский Егор Сергеевич',
            'birth_date' => '2008-02-09',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Филипов Максим Алексеевич',
            'birth_date' => '2007-06-23',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /** ------------------- Ярославич ------------------- **/
        Player::create([
            'full_name' => 'Аксенов Григорий Сергеевич',
            'birth_date' => '2007-03-23',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Андреюк Иван Александрович',
            'birth_date' => '2007-05-31',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Вельс Григорий Александрович',
            'birth_date' => '2007-03-29',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Гавриленко Кирилл Григорьевич',
            'birth_date' => '2009-01-25',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Золотарев Артем Андреевич',
            'birth_date' => '2007-08-08',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Зубов Матвей Юрьевич',
            'birth_date' => '2008-10-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Коротков Никита Алексеевич',
            'birth_date' => '2008-04-08',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Котко Матвей Николаевич',
            'birth_date' => '2007-03-01',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кузнецов Степан Андреевич',
            'birth_date' => '2007-08-11',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Клёмин Владимир Сергеевич',
            'birth_date' => '2008-06-03',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лукьянов Никита Сергеевич',
            'birth_date' => '2007-04-24',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Любутов Кирилл Владимирович',
            'birth_date' => '2008-06-26',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Максимычев Александр Сергеевич',
            'birth_date' => '2008-10-05',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Идиатуллин Александр Вадимович',
            'birth_date' => '2010-10-13',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Паничев Семен Александрович',
            'birth_date' => '2007-07-31',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Паутов Александ Павлович',
            'birth_date' => '2008-03-18',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Прощин Роман Дмитриевич',
            'birth_date' => '2007-08-16',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тихонов Ярослав Александрович',
            'birth_date' => '2009-08-05',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Федотов Георгий Максимович',
            'birth_date' => '2008-06-16',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Чесалов Алексей Дмитриевич',
            'birth_date' => '2007-04-10',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шилов Никита Сергеевич',
            'birth_date' => '2008-04-14',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Яковлев Ярослав Павлович',
            'birth_date' => '2008-02-29',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лащенов Никита Владимирович',
            'birth_date' => '2008-11-18',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Юханов Дмитрий Александрович',
            'birth_date' => '2007-02-22',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кузнецов Савелий Сергеевич',
            'birth_date' => '2007-05-05',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Прощин Роман Дмитриевич',
            'birth_date' => '2007-08-16',
            'position' => 'нападающий',
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Яркин Илья Юрьевич',
            'birth_date' => '2007-08-18',
            'position' => 'нападающий',
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Нутрихин Илья Владиславович',
            'birth_date' => '2007-10-18',
            'position' => 'вратарь',
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /** ------------------- Торпедо ------------------- **/
        Player::create([
            'full_name' => 'Чеблоков Даниил Дмитриевич',
            'birth_date' => '2001-12-27',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тихонов Антон Сергеевич',
            'birth_date' => '1986-07-16',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Пульников Илья Алексеевич',
            'birth_date' => '1998-04-12',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Медведев Георгий Алексеевич',
            'birth_date' => '1986-04-08',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шушин Даниил Владимирович',
            'birth_date' => '2001-01-15',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шлыков Егор Васильевич',
            'birth_date' => '2004-02-23',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Седов Егор Витальевич',
            'birth_date' => '2004-02-23',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Железняков Мирослав Сергеевич',
            'birth_date' => '2004-02-23',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Камушков Клим Владимирович',
            'birth_date' => '2001-10-26',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ткаченко Никита Александрович',
            'birth_date' => '2000-05-17',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Заблоцкий Евгений Алексеевич',
            'birth_date' => '1997-03-13',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Мурадов Алаудин Алиханович',
            'birth_date' => '1997-05-04',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Марков Андрей Михайлович',
            'birth_date' => '2000-01-05',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Никитин Станислав Андреевич',
            'birth_date' => '2001-12-13',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Орлов Илья Александрович',
            'birth_date' => '1999-04-30',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Челин Павел Николаевич',
            'birth_date' => '1986-06-17',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Голубев Владимир Александрович',
            'birth_date' => '1986-04-07',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Иванов Тихон Константинович',
            'birth_date' => '1998-08-27',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кравчук Егор Владимирович',
            'birth_date' => '2000-09-19',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Белавский Дмитрий Владимирович',
            'birth_date' => '1997-04-09',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Вакорин Дмитрий Витальевич',
            'birth_date' => '2004-07-14',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тихомиров Даниил Ярославович',
            'birth_date' => '1997-03-26',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тумаков Иван Александрович',
            'birth_date' => '2002-08-09',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Казаков Даниил',
            'birth_date' => '2002-08-09',
            'position' => 'вратарь',
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Буров Даниил',
            'birth_date' => '2001-07-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тельман Евгений',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Павлов Сергей',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Аверьянов Алексей Андреевич',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Воробьев Владислав Олегович',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Малетин Илья',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /** ------------------- Вымпел-К ------------------- **/
        Player::create([
            'full_name' => 'Агафонов Даниил Сергеевич',
            'birth_date' => '2006-07-12',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Бардин Даниил Алексеевич',
            'birth_date' => '2005-06-11',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Востриков Илья Вячеславович',
            'birth_date' => '2005-02-18',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Голубев Даниил Сергеевич',
            'birth_date' => '2004-05-19',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Закиров Виталий Эмирович',
            'birth_date' => '2000-04-05',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Захариков Данила Сергеевич',
            'birth_date' => '2003-05-23',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Леонтьев Даниил Анатольевич',
            'birth_date' => '2004-10-26',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Луппов Дмитрий Денисович',
            'birth_date' => '2002-10-24',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Никулин Даниил Станиславович',
            'birth_date' => '2002-06-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Новиков Арсений Андреевич',
            'birth_date' => '2007-01-08',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Петров Илья Михайлович',
            'birth_date' => '2002-12-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Румянцев Дмитрий Владимирович',
            'birth_date' => '2003-02-02',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Рябов Даниил Валентинович',
            'birth_date' => '2003-06-03',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Свешников Вячеслав Алексеевич',
            'birth_date' => '2006-03-04',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Сухов Кирилл Сергеевич',
            'birth_date' => '2005-06-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Хапов Никита Александрович',
            'birth_date' => '2006-01-07',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Хорохорин Александр Андреевич',
            'birth_date' => '2006-04-15',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Харин Александр Сергеевич',
            'birth_date' => '2000-03-03',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Чирканов Ярослав Дмитриевич',
            'birth_date' => '2005-01-07',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шунников Сергей Васильевич',
            'birth_date' => '2006-07-26',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лисин Иван Викторович',
            'birth_date' => '1999-06-30',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Мамеян Максим Тимурович',
            'birth_date' => '2005-01-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Павлишин Марк Олегович',
            'birth_date' => '2004-06-10',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Васильев Максим Сергеевич',
            'birth_date' => '2005-01-12',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Булкин Николай Дмитриевич',
            'birth_date' => '2005-03-10',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шлепов Игорь Сергеевич',
            'birth_date' => '2004-06-27',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кузнецов Дмитрий Анатольевич',
            'birth_date' => '2000-06-08',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Яковлев Тимофей Андреевич',
            'birth_date' => '2008-06-25',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /** ------------------- Искра ------------------- **/
        Player::create([
            'full_name' => 'Александров Максим Дмитриевич',
            'birth_date' => '2008-07-26',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Аладьин Денис Васильевич',
            'birth_date' => '1979-08-17',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Герасимов Артем Сергеевич',
            'birth_date' => '2007-11-29',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Дмитриев Илья Андреевич',
            'birth_date' => '2009-12-02',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Егоров Александр Олегович',
            'birth_date' => '2008-05-07',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ершов Андрей Дмитриевич',
            'birth_date' => '2008-06-26',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кабанков Егор Сергеевич',
            'birth_date' => '2008-09-27',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Коленкин Ярослав Антонович',
            'birth_date' => '2008-09-23',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Макрушин Максим Владимирович',
            'birth_date' => '2006-12-15',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Морозов Максим Денисович',
            'birth_date' => '2008-06-24',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Палкин Иван Игоревич',
            'birth_date' => '2008-05-08',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Петров Антон Владимирович',
            'birth_date' => '2004-08-14',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Поляков Владислав Сергеевич',
            'birth_date' => '2006-07-01',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Смирнов Руслан Евгеньевич',
            'birth_date' => '2008-09-24',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Смирнов Иван Дмитриевич',
            'birth_date' => '2007-09-13',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Френев Максим Романович',
            'birth_date' => '2008-04-09',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Смирнов Иван Дмитриевич',
            'birth_date' => '2004-10-20',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Чолпан Ярослав Игоревич',
            'birth_date' => '2008-02-04',
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /** ------------------- Локомотив СЖД ------------------- **/

        Player::create([
            'full_name' => 'Шурыгин Александр Сергеевич',
            'birth_date' => '1981-04-23',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тумаков Иван Александрович',
            'birth_date' => '2002-08-09',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Торцев Дмитрий Николаевич',
            'birth_date' => '1983-09-01',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Носков Сергей Владимирович',
            'birth_date' => '1987-08-27',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кочетков Александр Дмитриевич',
            'birth_date' => '1994-04-26',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шевцов Данил Сергеевич',
            'birth_date' => '1996-12-23',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кардышев Владислав Романович',
            'birth_date' => '2002-03-25',
            'position' => 'вратарь',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Куняков Егор Андреевич',
            'birth_date' => '1995-09-14',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Пикушин Николай Андреевич',
            'birth_date' => '1998-06-09',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Герасимов Савелий Денисович',
            'birth_date' => '2002-09-29',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Горев Егор Николаевич',
            'birth_date' => '2005-05-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тарасенко Игорь Валерьевич',
            'birth_date' => '1987-08-27',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Синдеев Егор Игоревич',
            'birth_date' => '2005-08-03',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Белозеров Никита Сергеевич',
            'birth_date' => '2006-07-14',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Комаров Семен Михайлович',
            'birth_date' => '1990-01-18',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Раков Михаил Юрьевич',
            'birth_date' => '1983-06-11',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лисицын Алексей Игоревич',
            'birth_date' => '1992-11-03',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Крутов Ярослав Николаевич',
            'birth_date' => '1994-05-25',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Коптев Андрей Михайлович',
            'birth_date' => '1983-09-16',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Рахимов Руслан Альбертович',
            'birth_date' => '1993-01-22',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кустов Даниил Дмитриевич',
            'birth_date' => '2001-07-01',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Чирьев Дмитрий Николаевич',
            'birth_date' => '1988-02-12',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Дуванский Павел Александрович',
            'birth_date' => '2005-02-06',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Куликов Денис Васильевич',
            'birth_date' => '1986-02-25',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Трусов Дмитрий Валентинович',
            'birth_date' => '2007-10-31',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Шопыгин Даниил Алексеевич',
            'birth_date' => '2007-11-19',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Павлов Руслан Ахмедович',
            'birth_date' => '1983-05-23',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Иванов Геннадий Матвеевич',
            'birth_date' => '1988-01-21',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Россинский Богдан Эдуардович',
            'birth_date' => '2006-10-27',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Снедков Евгений Геннадьевич',
            'birth_date' => '1995-11-08',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Игроки с полной информацией
        Player::create([
            'full_name' => 'Маслов Антон Сергеевич',
            'birth_date' => '1985-05-20',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Петрунин Андрей Николаевич',
            'birth_date' => '1984-02-21',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Замяткин Дмитрий Александрович',
            'birth_date' => '1996-03-02',
            'position' => 'нападающий',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Смирнов Александр Андреевич',
            'birth_date' => '1991-04-11',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Таганчиков Сергей Юрьевич',
            'birth_date' => '1995-11-24',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лебедев Андрей Николаевич',
            'birth_date' => '1975-01-18',
            'position' => 'левый', // Внимание! Нестандартное амплуа
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Осовской Евгений Борисович',
            'birth_date' => '1973-07-15',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Ульянов Антон Александрович',
            'birth_date' => '1987-01-29',
            'position' => 'защитник',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Кривоногих Артем Валерьевич',
            'birth_date' => '1987-04-22',
            'position' => 'защитник',
            'grip' => 'левый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Губенский Артем Юрьевич',
            'birth_date' => '2006-12-18',
            'position' => 'нападающий',
            'grip' => 'правый',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Лашаев Константин Алексеевич',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Юрченко Даниил',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Player::create([
            'full_name' => 'Тяжелов Даниил Алексеевич',
            'birth_date' => null,
            'position' => null,
            'grip' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
