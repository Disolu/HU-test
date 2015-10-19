<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bimestre extends Migration
{
    public function up()
    {
        Schema::create('bimestre', function (Blueprint $table) {
            $table->increments('idbimestre');
            $table->string('nombre');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('bimestre');
    }
}
