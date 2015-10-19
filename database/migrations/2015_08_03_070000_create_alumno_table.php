<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{

    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('idalumno');
            $table->string('nombres');
            $table->string('codigo');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->char('sexo',1);
            $table->enum('impedimento', ['0', '1'])->default('0');            
            $table->string('fecha_nacimiento');
            $table->string('dni');
            $table->string('telefono');
            $table->string('fullname');
            $table->string('direccion');

            $table->integer('idestadoalumno')->unsigned();
            $table->integer('iddepartamento')->unsigned();
            $table->integer('idprovincia')->unsigned();
            $table->integer('iddistrito')->unsigned();

            $table->foreign('idestadoalumno')->references('idestadoalumno')->on('estadoalumno')->onUpdate('cascade');
            $table->foreign('iddepartamento')->references('iddepartamento')->on('departamento')->onUpdate('cascade');
            $table->foreign('idprovincia')->references('idprovincia')->on('provincia')->onUpdate('cascade');
            $table->foreign('iddistrito')->references('iddistrito')->on('distrito')->onUpdate('cascade');
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alumno');
    }
}
