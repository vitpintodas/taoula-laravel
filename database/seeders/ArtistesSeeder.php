<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistesSeeder extends Seeder
{
    //generate a random date
    private function randDate() {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    //genarate a random  integer number bwteen 1 and 120
    private function randNumber() {
        return rand(1, 120);
    }
    
    public function run(): void
    {
        DB::table('artistes')->delete();

        $artistes = array("Stromae", "Angèle", "Maître Gims", "Zaz", "Indila", "Céline Dion", "David Guetta", "Soprano", "Kendji Girac", "Vianney", "Louane", "Amir", "Black M", "Jain", "Christine and The Queens", "Mister V");
       
        for ($i = 1; $i <= 15; $i++) {
            $date = $this->randDate();
            $number = $this->randNumber();
            DB::table('artistes')->insert(
                [
                    'nom' => $artistes[$i],
                    'nbLikes' => $number,
                    'created_at' => $date,
                    'updated_at' => $date
                ]
            );
        }
    }
}