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
        Schema::create('motoristas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeMotorista');
            $table->string('morada');
            $table->string('nrCarta');
            $table->date('dataNasci');
            $table->date('dataEmissaoCarta');
            $table->dateTime('criado_em');
            $table->unsignedBigInteger('criado_por');
            $table->foreign('criado_por')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('modificado_por');
            $table->foreign('modificado_por')->references('id')->on('usuarios')->onDelete('cascade');
            $table->dateTime('modificado_em');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motoristas');
    }
};
