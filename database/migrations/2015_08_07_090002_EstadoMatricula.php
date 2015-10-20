<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoMatricula extends Migration
{
    public function up()
    {
        Schema::create('estadomatricula', function (Blueprint $table) {
            $table->increments('idestadomatricula');
            $table->string('nombre');  
                        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('estadomatricula');
    }
}
