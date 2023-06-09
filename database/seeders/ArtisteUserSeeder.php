<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtisteUserSeeder extends Seeder
{
    //not finished yet, Léo Chollet 09/06/2023
    public function run(): void
    {
        
        DB::table('artiste_user')->delete();

        for ($i = 1; $i <= 100; $i++) {
            $numbers = range(1, 20);
            shuffle($numbers);
            $n = rand(3, 6);
            for ($j = 1; $j <= $n; $j++) {
                DB::table('article_motcle')->insert([
                'article_id' => $i,
                'motcle_id' => $numbers[$j]]);
            }
        }
    }
}
