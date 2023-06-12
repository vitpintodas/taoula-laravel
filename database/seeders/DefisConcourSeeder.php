<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DefisConcourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('defisConcours')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // création d'une durée aléatoire
        $fake = Faker::create();

        $duration = $fake->numberBetween(120, 600);

        $minutes = floor($duration / 60);
        $seconds = $duration % 60;

        $duree = $minutes . ':' . $seconds;

        DB::table('defisConcours')->insert([
            'user_id' => 1,
            'type' => 'sélection à la main',
            'duree' => $duree,
            'date_et_heure_publication' => Carbon::now(),
        ]);
    }
}
