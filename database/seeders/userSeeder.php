<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // suppression des données de la table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // création des données
        DB::table('users')->insert([
            'prenom' => 'john',
            'nom' => 'doe',
            'pseudo' => 'johndoe',
            'email' => 'john.doe@test.ch',
            'password' => Hash::make('password1'),
            'role_id' => 1,
            'coins' => 100,
            'NPA' => '1162',
            'localite' => 'St-Prex',
            'rue' => 'Rue de la gare',
        ]);

        // création des données
        User::factory()->count(20)->create();
    }
}
