<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoResumen extends Migration
{

    public function up()
    {
            Schema::create('alumnoresumen', function (Blueprint $table) {
            $table->integer('idalumno')->unsigned();
            $table->integer('idalumnodatos')->unsigned();
            $table->integer('idalumnoapoderado')->unsigned();
            $table->integer('idalumnoarchivos')->unsigned();

            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('idalumnodatos')->references('idalumnodatos')->on('alumnodatos')->onUpdate('cascade');            
            $table->foreign('idalumnoapoderado')->references('idalumnoapoderado')->on('alumnoapoderado')->onUpdate('cascade');
            $table->foreign('idalumnoarchivos')->references('idalumnoarchivos')->on('alumnoarchivos')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('alumnoresumen');
    }
}
