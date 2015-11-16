<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mensualidades extends Migration
{
    public function up()
    {
        Schema::create('mensualidades', function (Blueprint $table) {
            $table->increments('idmensualidades');
            $table->string('mes',2);
            $table->integer('idpension')->unsigned();
            $table->foreign('idpension')->references('idpension')->on('pension')->onDelete('cascade')->onUpdate('cascade'); 
            $table->integer('idalumno')->unsigned();
            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');  

            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();

        });
    }
    
    public function down()
    {
        Schema::drop('mensualidades');
    }
}
