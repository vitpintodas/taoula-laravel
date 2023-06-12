<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaylistTitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('playlist_titre')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Ajout des données
        for($i = 1; $i <= 25; $i++)
        {
            $ids = range(1, 15);
            shuffle($ids);
            $selection = array_rand($ids, 5);

            foreach($selection as $select)
            {
                DB::table('playlist_titre')->insert([
                    'playlist_id' => $i,
                    'titre_id' => $ids[$select],
                ]);
            }
        }
    }
}
