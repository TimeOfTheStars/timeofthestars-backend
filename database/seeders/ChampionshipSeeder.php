<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Championship;

class ChampionshipSeeder extends Seeder
{
    public function run(): void
    {
       Championship::create([
           'name' => 'Звезда Отечества',
           'start_date' => '2025-10-21',
           'end_date' => null,
           'location' => 'СК "Торпедо"',
           'created_at' => now(),
           'updated_at' => now(),
       ]);
    }
}
