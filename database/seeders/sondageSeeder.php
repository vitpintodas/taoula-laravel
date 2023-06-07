<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sondage;
use Carbon\Carbon;

class sondageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sondage::create([
            'users_id' => 1,
            'question' => 'Aimez-vous la bière ?',
            'duree_affichage' => Carbon::createFromTime(0, rand(0, 59), rand(0, 59)),
            'date_et_heure_publication' => Carbon::now(),
        ]);
    }
}
