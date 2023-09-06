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
        Schema::create('infermiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Matricule');
            $table->foreign('Matricule')->references('Matricule')->on('employes')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('nom');
            // $table->string('prenom');
            $table->string('service');
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
        Schema::dropIfExists('infermiers');
    }
};
