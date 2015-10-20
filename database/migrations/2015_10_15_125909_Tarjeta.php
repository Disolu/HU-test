<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tarjeta extends Migration
{
    public function up()
    {
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->increments('idtarjeta');
            $table->string('nombre');

            $table->integer('idnivel')->unsigned();
            $table->foreign('idnivel')->references('idnivel')->on('nivel')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tarjeta');
    }
}
