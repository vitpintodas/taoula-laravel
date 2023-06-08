<?php

namespace Database\Seeders;

use App\Models\Reponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class reponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reponse::create([
            'sondages_id' => 1,
            'defis_concours_id' => 1,
            'reponse' => 'Oui',
        ]);
    }
}
