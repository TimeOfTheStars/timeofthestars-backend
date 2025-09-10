<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TeamSeeder::class,
            PlayerSeeder::class,

            GameMatchSeeder::class,

//---------------------- Чемпионаты -----------------------
            ChampionshipSeeder::class,

            //ChampionshipGameSeeder::class,
            //ChampionshipTeamSeeder::class,
            //ChampionshipPlayerSeeder::class,

//---------------------------------------------------------

//------------------------ Турниры ------------------------
            TournamentSeeder::class,

            PreSeasonSeeder::class,
//---------------------------------------------------------
            UserSeeder::class,
        ]);
    }
}
