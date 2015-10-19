<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfesorCurso extends Migration
{
    public function up()
    {
        Schema::create('profesorcurso', function (Blueprint $table) {
            $table->increments('idprofesorcurso');
            $table->integer('iduser')->unsigned();
            $table->integer('idcurso')->unsigned();
            $table->integer('idperiodomatricula')->unsigned();

            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idcurso')->references('idcurso')->on('curso')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onDelete('cascade')->onUpdate('cascade');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('profesorcurso');
    }
}
