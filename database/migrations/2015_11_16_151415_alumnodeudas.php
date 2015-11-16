<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnodeudas extends Migration
{

    public function up()
    {
        Schema::create('alumnodeudas', function (Blueprint $table) {
            $table->increments('idalumnodeudas');
            $table->string('mes',2);
            $table->integer('idalumno')->unsigned();
            $table->integer('usercreate')->unsigned();
            $table->integer('idperiodomatricula')->unsigned();
            $table->integer('userupdate');
            $table->char('status',1);

            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');  
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onUpdate('cascade');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('alumnodeudas');
    }
}
