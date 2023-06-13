<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SondageDefisConcourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('sondageDefisConcours')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // création d'une durée aléatoire
        $fake = Faker::create();

        $duration = $fake->numberBetween(120, 600);

        $minutes = floor($duration / 60);
        $seconds = $duration % 60;

        $duree = $minutes . ':' . $seconds;

        DB::table('sondageDefisConcours')->insert([
            'user_id' => 1,
            'titre' => 'Quel est votre animal préféré ?',
            'type' => 'poll',
            'duree' => $duree,
            'date_et_heure_publication' => Carbon::now(),
            'choix' => '12 , 48, 24, 72',
            'bReponse' => '12',
        ]);
    }
}
