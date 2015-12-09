<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolusuarioTable extends Migration
{

    public function up()
    {
        Schema::create('roluser', function (Blueprint $table) {
            $table->increments('idroluser');
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::drop('roluser');
    }
}
