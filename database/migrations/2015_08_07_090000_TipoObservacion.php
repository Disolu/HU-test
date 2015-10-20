<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoObservacion extends Migration
{
    public function up()
    {
        Schema::create('tipoobservacion', function (Blueprint $table) {
            $table->increments('idtipoobservacion');
            $table->string('nombre');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tipoobservacion');
    }
}
