<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TarjetaBloque extends Migration
{
    public function up()
    {
        Schema::create('tarjetabloque', function (Blueprint $table) {
            $table->increments('idtarjetabloque');
            $table->integer('idbloque')->unsigned();
            $table->foreign('idbloque')->references('idbloque')->on('bloque')->onUpdate('cascade');

            $table->integer('idtarjeta')->unsigned();
            $table->foreign('idtarjeta')->references('idtarjeta')->on('tarjeta')->onUpdate('cascade');

            $table->integer('idbimestre')->unsigned();
            $table->foreign('idbimestre')->references('idbimestre')->on('bimestre')->onUpdate('cascade');
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tarjetabloque');
    }
}
