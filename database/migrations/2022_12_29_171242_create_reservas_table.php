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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_carrinha');
            $table->foreign('id_carrinha')->references('id')->on('carrinhas')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
};
