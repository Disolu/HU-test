<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vacantes extends Migration
{
    public function up()
    {
        Schema::create('vacante', function (Blueprint $table) {
            $table->increments('idvacante');
            $table->integer('qty_vacantes');
            $table->integer('qty_matriculados');

            $table->integer('idseccion')->unsigned();
            $table->integer('idgrado')->unsigned();            
            $table->integer('idnivel')->unsigned();
            $table->integer('idsede')->unsigned();
            $table->integer('idperiodomatricula')->unsigned();

            $table->foreign('idseccion')->references('idseccion')->on('seccion')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('idgrado')->references('idgrado')->on('grado')->onDelete('cascade')->onUpdate('cascade');                        
            $table->foreign('idnivel')->references('idnivel')->on('nivel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idsede')->references('idsede')->on('sede')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('vacante');
    }
}
