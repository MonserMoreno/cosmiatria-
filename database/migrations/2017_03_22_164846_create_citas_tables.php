<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('servicio',255);
            $table->string('mail',255);
            $table->string('numero',255);
            $table->date('fecha',255);
            $table->integer('hora');
            $table->boolean('estatus');
            $table->boolean('atendido');
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
        Schema::drop('citas');
    }
}
