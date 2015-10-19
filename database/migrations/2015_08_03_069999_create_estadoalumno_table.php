<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoalumnoTable extends Migration
{

    public function up()
    {
        Schema::create('estadoalumno', function (Blueprint $table) {
            $table->increments('idestadoalumno');
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('estadoalumno');
    }
}
