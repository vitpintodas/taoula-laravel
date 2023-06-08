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
        Schema::create('participations_users_defis', function (Blueprint $table) {
            $table->increments('id');

            // clés étrangères
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('defis_concours_id')->references('id')->on('defis');

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations_users_defis');
    }
};
