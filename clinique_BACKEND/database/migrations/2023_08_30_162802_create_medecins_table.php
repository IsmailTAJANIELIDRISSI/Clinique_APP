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
        Schema::create('medecins', function (Blueprint $table) {
            // $table->string('Matricule')->primary();
            $table->unsignedBigInteger('Matricule');
            $table->foreign('Matricule')->references('Matricule')->on('employes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Nom');
            $table->primary('Matricule');
            $table->string('Prenom');
            $table->string('Specialite');
            $table->string('Service');
            $table->double('Tarif');
            $table->string('Tel');
            $table->string('Email')->unique();
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
        Schema::dropIfExists('medecins');
    }
};
