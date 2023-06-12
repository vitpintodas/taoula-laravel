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
        Schema::create('sondages', function (Blueprint $table) {
            $table->bigIncrements('id');

            // clés étrangères
            $table->unsignedBigInteger('sondage_id');
            $table->foreign('sondage_id')->references('id')->on('sondages')->onDelete('cascade');
            $table->unsignedBigInteger('desfisConcours_id');
            $table->foreign('desfisConcour_id')->references('id')->on('desfisConcours')->onDelete('cascade');

            // informations sondage
            $table->string('question');
            $table->time('duree_affichage');
            $table->dateTime('heure_publication');

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sondages');
    }
};
