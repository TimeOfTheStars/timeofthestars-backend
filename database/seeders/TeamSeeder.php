<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'ХК Переславль',
            'city' => 'Переславль',
            'players_count' => 28,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Зубр',
            'city' => 'Ярославль',
            'players_count' => 18,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Вымпел-V',
            'city' => 'Ярославль',
            'players_count' => 29,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Ярославич',
            'city' => 'Ярославль',
            'players_count' => 29,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Торпедо',
            'city' => 'Ярославль',
            'players_count' => 30,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Вымпел-К',
            'city' => 'Ярославль',
            'players_count' => 28,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Искра',
            'city' => 'Ярославль',
            'players_count' => 18,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Локомотив СЖД',
            'city' => 'Ярославль',
            'players_count' => 43,
            'wins' => 0,
            'losses' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
