<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Informes extends Migration
{
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('idinforme');
            $table->string('nombres');
            $table->string('dni');
            $table->string('colegio');
            $table->string('direccion');
            $table->string('motivo');
            $table->string('comentario');
            $table->integer('idgrado')->unsigned();

            $table->foreign('idgrado')->references('idgrado')->on('grado')->onUpdate('cascade');

            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('informes');
    }
}
