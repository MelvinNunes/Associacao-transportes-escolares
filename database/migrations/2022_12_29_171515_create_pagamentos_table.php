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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva');
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
            $table->unsignedBigInteger('criado_por');
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
        Schema::dropIfExists('pagamentos');
    }
};
