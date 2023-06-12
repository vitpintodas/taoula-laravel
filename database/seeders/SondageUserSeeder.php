<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SondageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('sondage_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Ajout des données
        for($i = 2; $i <= 20; $i++)
        {
            DB::table('sondage_user')->insert([
                'sondage_id' => 1,
                'user_id' => $i,
            ]);
        }
    }
}
