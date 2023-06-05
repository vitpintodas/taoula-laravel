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
        Schema::create('appreciations', function (Blueprint $table) {
            $table->increments('id');

            // tables liées
            $table->foreign('id')
                ->references('id')
                ->on('users');
            $table->foreign('id')
                ->references('id')
                ->on('artistes');
            $table->foreign('id')
                ->references('id')
                ->on('titres');
            
            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appreciations');
    }
};
