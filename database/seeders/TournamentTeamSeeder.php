<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TournamentTeam;

class TournamentTeamSeeder extends Seeder
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

        TournamentTeam::create([
            'tournament_id' => $tovarischesky,
            'team_id' => $pereslavl,
        ]);

        TournamentTeam::create([
            'tournament_id' => $tovarischesky,
            'team_id' => $zubr,
        ]);

        TournamentTeam::create([
            'tournament_id' => $tovarischesky,
            'team_id' => $vympelV,
        ]);

        TournamentTeam::create([
            'tournament_id' => $tovarischesky,
            'team_id' => $yaroslavich,
        ]);

        TournamentTeam::create([
            'tournament_id' => $tovarischesky,
            'team_id' => $torpedo,
        ]);
    }
}
