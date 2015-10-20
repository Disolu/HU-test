<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FechaNotas extends Migration
{
    public function up()
    {
        Schema::create('fechanota', function (Blueprint $table) {
            $table->increments('idfechanota');
            $table->integer('idbimestre')->unsigned();
            $table->integer('idperiodomatricula')->unsigned();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->foreign('idbimestre')->references('idbimestre')->on('bimestre')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onDelete('cascade')->onUpdate('cascade');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('fechanota');
    }
}
