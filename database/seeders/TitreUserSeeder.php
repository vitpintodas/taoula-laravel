<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artiste_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // ajout des données
        for($i = 2; $i <= 20; $i++)
        {
            $n = rand(3, 6);
            $artistes = range(1, 15);
            shuffle($artistes);
            $selection = array_rand($artistes, $n);

            foreach($selection as $select)
            {
                DB::table('artiste_user')->insert([
                    'user_id' => $i,
                    'artiste_id' => $artistes[$select],
                    'date_et_heure' => Carbon::now(),
                ]);
            }
        }
    }
}
