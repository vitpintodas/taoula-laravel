<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitreUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::table('artiste_user')->delete();

        // ajout des données
        for ($i = 2; $i <= 20; $i++) {
            $n = rand(3, 6);
            for ($j = 1; $j <= $n; $j++) {
                $a = range(1, 15);
                shuffle($a);

                DB::table('artiste_user')->insert([
                    'user_id' => $i,
                    'artiste_id' => $a
                ]);
            }
        }
    }
}
