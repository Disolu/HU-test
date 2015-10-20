<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionTable extends Migration
{

    public function up()
    {
        Schema::create('seccion', function (Blueprint $table) {
            $table->increments('idseccion');
            $table->string('nombre');
            $table->integer('idgrado')->unsigned();
            $table->integer('idsede')->unsigned();
            $table->integer('idnivel')->unsigned();

            $table->foreign('idgrado')->references('idgrado')->on('grado')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('idsede')->references('idsede')->on('sede')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idnivel')->references('idnivel')->on('nivel')->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('seccion');
    }
}
