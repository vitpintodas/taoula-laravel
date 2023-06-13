<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReponsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('reponses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $reponses = ['Oui', 'Non'];

        // Ajout des données
        for($i = 2; $i <= 20; $i++)
        {
            $aleatoire = $reponses[array_rand($reponses)];

            DB::table('reponses')->insert([
                'sondageDefisConcours_id' => 1,
                'reponse' => $aleatoire,
            ]);
        }
    }
}
