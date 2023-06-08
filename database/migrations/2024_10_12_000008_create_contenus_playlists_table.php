<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contenus_playlists', function (Blueprint $table) {
            $table->increments('id');

            // clés étrangères
            $table->foreign('playlists_id')->references('id')->on('playlists');
            $table->foreign('titres_id')->references('id')->on('titres');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenus_playlists');
    }
};
