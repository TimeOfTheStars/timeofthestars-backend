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
            'name' => 'СХК Переславль-Залесский',
            'city' => 'Переславль-Залесский',
            'slug'=> 'pereslavl',
            'players_count' => 28,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Зубр',
            'city' => 'Ярославль',
            'slug'=> 'zubr',
            'players_count' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Вымпел-V',
            'city' => 'Ярославль',
            'players_count' => 29,
            'slug'=> 'vympelv',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Ярославич',
            'city' => 'Ярославль',
            'players_count' => 29,
            'slug'=> 'yaroslavich',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК Торпедо',
            'city' => 'Ярославль',
            'players_count' => 30,
            'slug'=> 'torpedo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Team::create([
            'name' => 'ХК БГВ',
            'city' => 'Ярославль',
            'players_count' => 30,
            'slug' => 'bgv',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

//        Team::create([
//            'name' => 'ХК Вымпел-К',
//            'city' => 'Ярославль',
//            'players_count' => 30,
//            'wins' => 0,
//            'losses' => 0,
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]);

    }
}
