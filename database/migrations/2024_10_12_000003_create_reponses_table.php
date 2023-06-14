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
        Schema::create('reponses', function (Blueprint $table) {
            $table->bigIncrements('id');

            // clés étrangères
            $table->unsignedBigInteger('sondageDefisConcours_id');
            $table->foreign('sondageDefisConcours_id')->references('id')->on('sondageDefisConcours')->onDelete('cascade');

            // informations réponse
            $table->string('reponse');

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
