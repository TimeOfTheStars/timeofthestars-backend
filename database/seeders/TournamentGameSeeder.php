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
        $predsezon = Tournament::where('name', 'Предсезонный турнир')->first()->id;

        $pereslavl = Team::where('name', 'ХК Переславль')->first()->id;
        $zubr = Team::where('name', 'ХК Зубр')->first()->id;
        $vympelV = Team::where('name', 'ХК Вымпел-V')->first()->id;
        $vympelK = Team::where('name', 'ХК Вымпел-К')->first()->id;
        $yaroslavich = Team::where('name', 'ХК Ярославич')->first()->id;
        $torpedo = Team::where('name', 'ХК Торпедо')->first()->id;
        $bgv = Team::where('name', 'ХК БГВ')->first()->id;

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $zubr)
                ->where('date','2024-09-09')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $torpedo)
                ->where('team_b_id', $vympelV)
                ->where('date','2024-09-10')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $pereslavl)
                ->where('team_b_id', $bgv)
                ->where('date','2024-09-12')
                ->first()->id,
        ]);
//-----------------------------------------------------------------------------------------
        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $torpedo)
                ->where('date','2024-09-16')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $vympelV)
                ->where('team_b_id', $bgv)
                ->where('date','2024-09-17')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $pereslavl)
                ->where('team_b_id', $zubr)
                ->where('date','2024-09-19')
                ->first()->id,
        ]);
//-----------------------------------------------------------------------------------------
        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $zubr)
                ->where('team_b_id', $vympelV)
                ->where('date','2024-09-23')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $torpedo)
                ->where('team_b_id', $bgv)
                ->where('date','2024-09-24')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $pereslavl)
                ->where('date','2024-09-26')
                ->first()->id,
        ]);
//-----------------------------------------------------------------------------------------
        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $vympelK)
                ->where('team_b_id', $yaroslavich)
                ->where('date','2024-09-30')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $zubr)
                ->where('team_b_id', $bgv)
                ->where('date','2024-10-01')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $pereslavl)
                ->where('team_b_id', $torpedo)
                ->where('date','2024-10-03')
                ->first()->id,
        ]);
        //-----------------------------------------------------------------------------------------
        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $yaroslavich)
                ->where('team_b_id', $bgv)
                ->where('date','2024-10-07')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $pereslavl)
                ->where('team_b_id', $vympelV)
                ->where('date','2024-10-08')
                ->first()->id,
        ]);

        TournamentGame::create([
            'tournament_id' => $predsezon,
            'game_id' => Game::where('team_a_id', $zubr)
                ->where('team_b_id', $torpedo)
                ->where('date','2024-10-10')
                ->first()->id,
        ]);
    }
}
