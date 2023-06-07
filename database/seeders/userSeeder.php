<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'prenom' => 'john',
            'nom' => 'doe',
            'pseudo' => 'johndoe',
            'email' => 'john.doe@test.ch',
            'password' => Hash::make('password1'),
            'roles_id' => 1,
            'coins' => 100,
            'NPA' => '1162',
            'localite' => 'St-Prex',
            'rue' => 'Rue de la gare',
        ]);
    }
}
