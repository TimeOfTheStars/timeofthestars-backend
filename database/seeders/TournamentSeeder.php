<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    public function run(): void
    {
        Tournament::create([
            'name' => 'Предсезонный турнир',
            'start_date' => '2025-09-09',
            'end_date' => '2025-10-14',
            'location' => 'СК "Торпедо"',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
