<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedeTable extends Migration
{

    public function up()
    {
        Schema::create('sede', function (Blueprint $table) {
            $table->increments('idsede');
            $table->string('nombre');
            $table->string('sede_direccion');

            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('sede');
    }
}
