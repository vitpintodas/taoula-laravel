<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Process\FakeProcessResult;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TitreSeeder extends Seeder
{
    //genarate a random  integer number bwteen 1 and 120
    private function randNumber() {
        return rand(1, 120);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('titres')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // création des données
        $titres = ['Bohemian Rhapsody', 'Smells Like Teen Spirit', 'Imagine', 'Like a Rolling Stone', 'Hey Jude', 'Billie Jean', 'Hotel California', 'Stairway to Heaven', 'Thriller', 'Yesterday', 'Shape of You', 'Bohemian Like You', 'Rolling in the Deep', 'Sweet Child o Mine', 'Dont Stop Believin', 'Hallelujah', 'Crazy in Love', 'Wannabe', 'Seven Nation Army'];

        $genres = ['Rock', 'Pop', 'Rap', 'Jazz', 'Classique', 'Metal', 'Electro', 'Reggae', 'Country', 'Soul', 'Funk', 'Disco', 'Blues', 'RnB', 'Variété', 'Gospel', 'Latino', 'Musique du monde', 'Chanson française', 'Autre'];

        $fake = Faker::create();

        // insertion des données dans la table
        foreach ($titres as $titre) {
            // création d'une durée aléatoire
            $duration = $fake->numberBetween(120, 600);

            $minutes = floor($duration / 60);
            $seconds = $duration % 60;

            $duree = $minutes . ':' . $seconds;

            // création d'un genre aléatoire
            $n = rand(0, 19);

            DB::table('titres')->insert([
                'nom' => $titre,
                'nbLikes' => $this->randNumber(),
                'duree' => $duree,
                'genre' => $genres[$n],
            ]);
        }
    }
}
