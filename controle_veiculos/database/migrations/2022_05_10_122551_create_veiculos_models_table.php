<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos_models', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('cor');
            $table->UnsignedBigInteger('proprietario_id');
            $table->integer('ano'); 
            $table->string('marca');
            $table->string('modelo');
            $table->foreign('proprietario_id')->references('id')->on('usuarios_models');
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
        Schema::dropIfExists('veiculos_models');
    }
}
