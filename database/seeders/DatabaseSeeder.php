<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TeamSeeder::class, //+
            PlayerSeeder::class, //+

            GameMatchSeeder::class,//+

            //ChampionshipSeeder::class, //+
            //ChampionshipGameSeeder::class,
            //ChampionshipTeamSeeder::class,
            //ChampionshipPlayerSeeder::class,

            TournamentSeeder::class,//+
            TournamentGameSeeder::class,//+
            TournamentTeamSeeder::class,//+
            TournamentPlayerSeeder::class,
            UserSeeder::class,
        ]);
    }
}
