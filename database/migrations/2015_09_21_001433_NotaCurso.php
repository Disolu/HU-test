<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotaCurso extends Migration
{
    public function up()
    {
        Schema::create('notacurso', function (Blueprint $table) {
            $table->increments('idnotacurso');
            $table->integer('idbimestre')->unsigned();
            $table->integer('idperiodomatricula')->unsigned();
            $table->integer('idalumno')->unsigned();
            $table->integer('idcurso')->unsigned();
            $table->integer('idseccion')->unsigned();
            $table->decimal('nota_number');
            $table->char('nota_char',2);

            $table->foreign('idcurso')->references('idcurso')->on('curso')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idseccion')->references('idseccion')->on('seccion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idbimestre')->references('idbimestre')->on('bimestre')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onDelete('cascade')->onUpdate('cascade');            
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('notacurso');
    }
}
