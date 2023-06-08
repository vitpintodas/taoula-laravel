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
        Schema::create('historiques_likes', function (Blueprint $table) {
            $table->increments('id');

            // clés étrangères
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('titres_id')->references('id')->on('titres');

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
        Schema::dropIfExists('historiques_likes');
    }
};
