<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoIncidenciaPago extends Migration
{
    public function up()
    {
      Schema::create('alumnoincidenciapagos', function (Blueprint $table) {
        $table->increments('idincidenciapagos');
        $table->string('titulo');
        $table->text('observacion');
        $table->integer('idtipoincidencia');
        
        $table->integer('usercreate')->unsigned();
        $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
        $table->integer('userupdate');

        $table->integer('idalumno')->unsigned();
        $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');            

        $table->timestamps();
        $table->softDeletes();
      });
    }

    public function down()
    {
        Schema::drop('alumnoincidenciapagos');
    }
}
