<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class droitAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::table('droit_access')->delete();

        // création des données
        $droit_access = 'url/';

        // insertion des données dans la table
        for($i = 1; $i <= 5; $i++)
        {
            DB::table('droitAccess')->insert([
                'url' => $droit_access.$i,
            ]);
        }
    }
}
