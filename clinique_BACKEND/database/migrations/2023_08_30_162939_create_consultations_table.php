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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id('NumeroConsultation');
            $table->unsignedBigInteger('Numero');
            $table->foreign('Numero')->references('Numero')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('TypeConsultation');
            $table->unsignedBigInteger('Matricule');
            $table->foreign('Matricule')->references('Matricule')->on('medecins')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Objet');
            $table->string('Observation');
            $table->date('Date');
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
        Schema::dropIfExists('consultations');
    }
};
