<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\TournamentGame;
use App\Models\Tournament;
use App\Models\Game;

class TournamentGameSeeder extends Seeder
{
    public function run()
    {
        $tovarischesky = Tournament::where('name', 'Товарищеский турнир')->first()->id;

        $pereslavl = Team::where('name', 'ХК Переславль')->first()->id;
        $zubr = Team::where('name', 'ХК Зубр')->first()->id;
        $vympelV = Team::where('name', 'ХК Вымпел-V')->first()->id;
        $yaroslavich = Team::where('name', 'ХК Ярославич')->first()->id;
        $torpedo = Team::where('name', 'ХК Торпедо')->first()->id;

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $torpedo)
                ->where('team_b_id', $zubr)
                ->where('date','2024-09-04')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $pereslavl)
                ->where('date','2024-09-06')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $vympelV)
                ->where('team_b_id', $yaroslavich)
                ->where('date','2024-09-10')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $vympelV)
                ->where('team_b_id', $zubr)
                ->where('date','2024-09-11')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $pereslavl)
                ->where('team_b_id', $torpedo)
                ->where('date','2024-09-13')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $pereslavl)
                ->where('team_b_id', $zubr)
                ->where('date','2024-09-20')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $vympelV)
                ->where('team_b_id', $torpedo)
                ->where('date','2024-09-22')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $zubr)
                ->where('date','2024-09-24')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $vympelV)
                ->where('team_b_id', $pereslavl)
                ->where('date','2024-09-27')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $tovarischesky,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $torpedo)
                ->where('date','2024-10-01')
                ->first()->id,
        ]);
    }
}
