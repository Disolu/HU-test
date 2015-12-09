<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfesorTutoria extends Migration
{
    public function up()
    {
      Schema::create('profesortutoria', function (Blueprint $table) {
        $table->increments('idprofesortutoria');
        $table->integer('idseccion')->unsigned();
        $table->integer('idprofesor')->unsigned();
        $table->integer('idperiodomatricula')->unsigned();

        $table->foreign('idseccion')->references('idseccion')->on('seccion')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('idprofesor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onUpdate('cascade');
        
        $table->timestamps();
        $table->softDeletes();
      });
    }

    public function down()
    {
      Schema::drop('profesortutoria');
    }
}
