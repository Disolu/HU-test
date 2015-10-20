<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelTable extends Migration
{

    public function up()
    {
        Schema::create('nivel', function (Blueprint $table) {
            $table->increments('idnivel');
            $table->string('nombre');
            $table->integer('idsede')->unsigned();
            $table->foreign('idsede')->references('idsede')->on('sede')->onDelete('cascade')->onUpdate('cascade');
           
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('nivel');
    }
}
