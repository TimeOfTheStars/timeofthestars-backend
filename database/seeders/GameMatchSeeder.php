<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Seeder;
use function Symfony\Component\Translation\t;

class GameMatchSeeder extends Seeder
{
    public function run(): void
    {
        $pereslavl = Team::where('name', 'ХК Переславль')->first()->id;
        $zubr = Team::where('name', 'ХК Зубр')->first()->id;
        $vympelV = Team::where('name', 'ХК Вымпел-V')->first()->id;
        $yaroslavich = Team::where('name', 'ХК Ярославич')->first()->id;
        $torpedo = Team::where('name', 'ХК Торпедо')->first()->id;
        $bgv = Team::where('name', 'ХК БГВ')->first()->id;

        $matches = [
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $zubr,
                'date' => '2025-09-09',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $torpedo,
                'team_b_id' => $vympelV,
                'date' => '2025-09-10',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $pereslavl,
                'team_b_id' => $bgv,
                'date' => '2025-09-12',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
//----------------------------------------------------------------
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $torpedo,
                'date' => '2025-09-16',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $vympelV,
                'team_b_id' => $bgv,
                'date' => '2025-09-17',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $pereslavl,
                'team_b_id' => $zubr,
                'date' => '2025-09-19',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            //----------------------------------------------------------------
            [
                'team_a_id' => $zubr,
                'team_b_id' => $vympelV,
                'date' => '2025-09-23',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $torpedo,
                'team_b_id' => $bgv,
                'date' => '2025-09-24',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $pereslavl,
                'date' => '2025-09-26',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            //----------------------------------------------------------------
            [
                'team_a_id' => $vympelV,
                'team_b_id' => $yaroslavich,
                'date' => '2025-09-30',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $zubr,
                'team_b_id' => $bgv,
                'date' => '2025-10-01',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $pereslavl,
                'team_b_id' => $torpedo,
                'date' => '2025-10-03',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            //----------------------------------------------------------------
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $bgv,
                'date' => '2025-10-07',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $pereslavl,
                'team_b_id' => $vympelV,
                'date' => '2025-10-08',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
            [
                'team_a_id' => $zubr,
                'team_b_id' => $torpedo,
                'date' => '2025-10-10',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => null
            ],
        ];

        foreach ($matches as $match) {
            Game::create($match);
        }
    }
}
