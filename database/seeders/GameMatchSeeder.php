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

        //$vympel = Team::where('name', 'ХК Вымпел-К')->first()->id;
        //$iskra = Team::where('name', 'ХК Искра')->first()->id;
        //$lokomotiv = Team::where('name', 'ХК Локомотив СЖД')->first()->id;

        $matches = [
            [
                'team_a_id' => $torpedo,
                'team_b_id' => $zubr,
                'date' => '2024-09-04',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '3:8'
            ],
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $pereslavl,
                'date' => '2024-09-06',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '3:8'
            ],
            [
                'team_a_id' => $vympelV,
                'team_b_id' => $yaroslavich,
                'date' => '2024-09-10',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '11:4'
            ],
            [
                'team_a_id' => $vympelV,
                'team_b_id' => $zubr,
                'date' => '2024-09-11',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '5:5'
            ],
            [
                'team_a_id' => $pereslavl,
                'team_b_id' => $torpedo,
                'date' => '2024-09-13',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '9:3'
            ],
            [
                'team_a_id' => $pereslavl,
                'team_b_id' => $zubr,
                'date' => '2024-09-20',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '6:3'
            ],
            [
                'team_a_id' => $vympelV,
                'team_b_id' => $torpedo,
                'date' => '2024-09-22',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '2:2'
            ],
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $zubr,
                'date' => '2024-09-24',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '2:4'
            ],
            [
                'team_a_id' => $vympelV,
                'team_b_id' => $pereslavl,
                'date' => '2024-09-27',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '1:3'
            ],
            [
                'team_a_id' => $yaroslavich,
                'team_b_id' => $torpedo,
                'date' => '2024-10-01',
                'time' => '20:00:00',
                'location' => 'СК "Торпедо"',
                'score' => '7:8'
            ],
        ];

        foreach ($matches as $match) {
            Game::create($match);
        }
    }
}
