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
        Schema::create('titres', function (Blueprint $table) {
            $table->increments('id');

            // informations titre
            $table->string('nom');
            $table->string('genre');
            $table->time('duree');

            // appréciations
            $table->integer('nbLikes')->default(0);

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titres');
    }
};
