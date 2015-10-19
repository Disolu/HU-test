<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfesorSeccion extends Migration
{
    public function up()
    {
        Schema::create('profesorseccion', function (Blueprint $table) {
            $table->increments('idprofesorseccion');

            $table->integer('idseccion')->unsigned();
            $table->integer('idprofesorcurso')->unsigned();
            $table->foreign('idseccion')->references('idseccion')->on('seccion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idprofesorcurso')->references('idprofesorcurso')->on('profesorcurso')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('profesorseccion');
    }
}
