<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    public function run(): void
    {
        Tournament::create([
            'name' => 'Товарищеский турнир',
            'start_date' => '2024-09-04',
            'end_date' => '2024-10-01',
            'location' => 'СК "Торпедо"',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

//        Tournament::create([
//            'name' => 'Кубок победы',
//            'start_date' => '2025-05-01',
//            'end_date' => '2025-05-04',
//            'location' => '"ГУОР"',
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]);
    }
}
