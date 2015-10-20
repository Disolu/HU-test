<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoarchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnoarchivos', function (Blueprint $table) {
            $table->increments('idalumnoarchivos');
            $table->string('compromiso_url');            
            $table->string('anexo_url');
            $table->string('reciboluz_url');
            $table->string('dni_apoderado');

            $table->integer('idperiodomatricula')->unsigned();
            $table->integer('idalumno')->unsigned();
            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onUpdate('cascade');            
            
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
        Schema::drop('alumnoarchivos');
    }
}
