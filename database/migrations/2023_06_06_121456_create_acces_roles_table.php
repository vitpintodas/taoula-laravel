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
        Schema::create('acces_roles', function (Blueprint $table) {
            $table->increments('id');

            // clés étrangères
            $table->foreign('roles_id')->references('id')->on('roles')->unique();
            $table->foreign('droits_acces_id')->references('id')->on('droits_acces')->unique();

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acces_roles');
    }
};
