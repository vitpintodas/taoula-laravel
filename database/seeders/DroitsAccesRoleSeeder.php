<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DroitsAccesRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('droitsacces_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // insérer les données
        for($i = 2; $i <= 20; $i++)
        {
            DB::table('droitsacces_role')->insert([
                'role_id' => 2,
                'droitsAcces_id' => 1,
            ]);
        }

    }
}
