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
        Schema::create('defis_concours', function (Blueprint $table) {
            $table->increments('id');

            // clés étrangères
            $table->foreign('users_id')->references('id')->on('users');

            // informations défi
            $table->string('type');
            $table->time('duree');
            $table->string('password');
            $table->dateTime('date_et_heure_publication');

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defis_concours');
    }
};
