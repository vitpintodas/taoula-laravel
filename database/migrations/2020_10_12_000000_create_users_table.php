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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            // informations utilisateur
            $table->string('prenom', 100);
            $table->string('nom', 100)->nullable();

            // informations de connexion
            $table->string('pseudo', 100)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->nullable()->onDelete('cascade');

            // monnaie virtuelle
            $table->integer('coins')->default(0);

            // adresse utilisateur
            $table->string('NPA', 4)->nullable();
            $table->string('localite', 100)->nullable();
            $table->string('rue', 100)->nullable();

            // informations de connexion
            $table->rememberToken();

            // table créé à et modifié à
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
