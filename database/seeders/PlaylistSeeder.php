<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::table('playlist')->delete();

        // Ajout des données
        for($i = 1; $i <= 100; $i++)
        {
            DB::table('playlist')->insert([
                'nom' => 'playlist'.$i,
            ]);
        }
    }
}
