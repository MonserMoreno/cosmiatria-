<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
  
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('mail',255);
            $table->string('numero',255);
            $table->integer('citas');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('clientes');
    }
}
