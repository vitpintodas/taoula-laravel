<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DefiConcour;
use Carbon\Carbon;

class defiConcourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DefiConcour::create([
            'users_id' => 1,
            'type' => 'type1',
            'duree' => date('H:i:s', rand(0, 86399)),
            'password' => 'password1',
            'date_et_heure_publication' => Carbon::now(),
        ]);
    }
}
