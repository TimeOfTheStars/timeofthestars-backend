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

            ZvezdaOtechestvaSeeder::class,

            ChampionshipTeamsSeeder::class,

//---------------------------------------------------------

//------------------------ Турниры ------------------------
            TournamentSeeder::class,

            PreSeasonSeeder::class,
//---------------------------------------------------------

            TournamentTeamsSeeder::class,

             UserSeeder::class,
        ]);
    }
}
