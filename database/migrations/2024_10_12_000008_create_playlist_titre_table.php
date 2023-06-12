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
        Schema::create('playlist_titre', function (Blueprint $table) {
            $table->bigIncrements('id');

            // clés étrangères
            $table->unsignedBigInteger('playlist_id');
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->unsignedBigInteger('titre_id');
            $table->foreign('titre_id')->references('id')->on('titres')->onDelete('cascade');

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
