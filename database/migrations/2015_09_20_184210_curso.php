<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Curso extends Migration
{
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('idcurso');
            $table->string('nombre');
            $table->integer('idgrado')->unsigned();
            $table->foreign('idgrado')->references('idgrado')->on('grado')->onDelete('cascade')->onUpdate('cascade');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('curso');
    }
}
