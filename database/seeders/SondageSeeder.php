<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SondageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::table('sondages')->delete();

        // création d'une durée aléatoire
        $fake = Faker::create();

        $duration = $fake->numberBetween(120, 600);

        $minutes = floor($duration / 60);
        $seconds = $duration % 60;

        $duree = $minutes . ':' . $seconds;

        DB::table('sondages')->insert([
            'user_id' => 1,
            'question' => 'Quel est votre animal préféré ?',
            'duree_affichage' => $duree,
            'heure_publication' => Carbon::now(),
        ]);
    }
}
