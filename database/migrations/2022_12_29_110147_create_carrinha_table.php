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
        Schema::create('carrinhas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_motorista');
            $table->foreign('id_motorista')->references('id')->on('motoristas')->onDelete('cascade');
            $table->string('contacto');
            $table->string('rota');
            $table->integer('nr_lugares');
            $table->integer('nr_lugares_ocupados');
            $table->float('preco');
            $table->string('image');
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->foreign('criado_por')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('modificado_por')->nullable();
            $table->foreign('modificado_por')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('carrinha');
    }
};
