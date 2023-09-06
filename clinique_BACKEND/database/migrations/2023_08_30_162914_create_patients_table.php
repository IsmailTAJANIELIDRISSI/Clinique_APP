<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('Numero');
            $table->string('CIN')->unique();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Adresse');
            $table->string('Tel');
            $table->string('Email');
            $table->unsignedBigInteger('Matricule');
            $table->foreign('Matricule')->references('Matricule')->on('medecins')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
