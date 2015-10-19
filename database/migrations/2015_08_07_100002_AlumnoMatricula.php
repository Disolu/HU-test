<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoMatricula extends Migration
{
    public function up()
    {
        Schema::create('alumnomatricula', function (Blueprint $table) {
            $table->increments('idalumnomatricula');
            $table->integer('idalumno')->unsigned();
            $table->integer('idseccion')->unsigned();
            $table->integer('idnivel')->unsigned();
            $table->integer('idsede')->unsigned();
            $table->integer('idperiodomatricula')->unsigned();
            $table->integer('idgrado')->unsigned();
            $table->integer('idpension')->unsigned();
            $table->integer('idestadomatricula')->unsigned();
            $table->integer('idtipopension')->unsigned();
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onUpdate('cascade');            
            $table->foreign('idseccion')->references('idseccion')->on('seccion')->onUpdate('cascade');
            $table->foreign('idnivel')->references('idnivel')->on('nivel')->onUpdate('cascade');
            $table->foreign('idsede')->references('idsede')->on('sede')->onUpdate('cascade');
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onUpdate('cascade');
            $table->foreign('idgrado')->references('idgrado')->on('grado')->onUpdate('cascade');
            $table->foreign('idpension')->references('idpension')->on('pension')->onUpdate('cascade');  
            $table->foreign('idestadomatricula')->references('idestadomatricula')->on('estadomatricula')->onUpdate('cascade');    
            $table->foreign('idtipopension')->references('idtipopension')->on('tipopension')->onUpdate('cascade');    
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('alumnomatricula');
    }
}
