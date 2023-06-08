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
        Schema::create('artiste_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            // clés étrangères
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('artiste_id');
            $table->foreign('artiste_id')->references('id')->on('titres');

            // informations historique
            $table->dateTime('date_et_heure');

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_like_artiste');
    }
};