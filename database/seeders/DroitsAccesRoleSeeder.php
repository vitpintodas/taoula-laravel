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
        DB::table('droitsaccess_role')->delete();

        // insérer les données
        for($i = 2; $i <= 20; $i++)
        {
            DB::table('droitsaccess_role')->insert([
                'role_id' => 2,
                'droitsaccess_id' => 1,
            ]);
        }

    }
}
