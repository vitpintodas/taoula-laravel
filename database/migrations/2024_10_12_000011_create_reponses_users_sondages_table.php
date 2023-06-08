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
        Schema::create('reponses_users_sondages', function (Blueprint $table) {
            $table->increments('id');

            // clés étrangères
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('sondages_id')->references('id')->on('sondages');

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses_users_sondages');
    }
};
