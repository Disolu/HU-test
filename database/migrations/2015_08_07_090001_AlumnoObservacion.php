<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoObservacion extends Migration
{
    public function up()
    {
        Schema::create('alumnoobservacion', function (Blueprint $table) {
            $table->increments('idalumnoobservacion');
            $table->string('titulo');
            $table->text('observacion');
            $table->integer('idtipoobservacion')->unsigned();
            $table->foreign('idtipoobservacion')->references('idtipoobservacion')->on('tipoobservacion')->onUpdate('cascade');
            
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
        Schema::drop('alumnoobservacion');
    }
}
