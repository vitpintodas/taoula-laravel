<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // appel des seeders
        $this->call(RoleSeeder::class);
        $this->call(DroitAccessSeeder::class);
        $this->call(DroitsAccesRoleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(PlaylistSeeder::class);
        $this->call(TitreSeeder::class);
        $this->call(ArtistesSeeder::class);
        $this->call(PlaylistTitreSeeder::class);
        $this->call(PlaylistUserSeeder::class);
        $this->call(TitreUserSeeder::class);
        $this->call(ArtisteUserSeeder::class);
        $this->call(SondageSeeder::class);
        $this->call(DefisConcourSeeder::class);
        $this->call(ReponsesSeeder::class);
        $this->call(SondageUserSeeder::class);
    }
}
