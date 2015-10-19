<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoApoderado extends Migration
{
    public function up()
    {
        Schema::create('alumnoapoderado', function (Blueprint $table) {
            $table->increments('idalumnoapoderado');

            $table->string('p_nombres');
            $table->string('p_apellidos');
            $table->string('p_dni');
            $table->string('p_estadocivil');
            $table->string('p_lugarresidencia');
            $table->string('p_telefonofijo');
            $table->string('p_telefonotrabajo');
            $table->string('p_celular');
            $table->string('p_email');

            $table->string('m_nombres');
            $table->string('m_apellidos');
            $table->string('m_dni');
            $table->string('m_estadocivil');
            $table->string('m_lugarresidencia');
            $table->string('m_telefonofijo');
            $table->string('m_telefonotrabajo');
            $table->string('m_celular');
            $table->string('m_email');
            
            $table->string('a_nombres');
            $table->string('a_apellidos');
            $table->string('a_dni');
            $table->string('a_estadocivil');
            $table->string('a_lugarresidencia');
            $table->string('a_telefonofijo');
            $table->string('a_telefonotrabajo');
            $table->string('a_celular');
            $table->string('a_email');

            $table->integer('idalumno')->unsigned();
            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');            
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('alumnoapoderado');
    }
}
