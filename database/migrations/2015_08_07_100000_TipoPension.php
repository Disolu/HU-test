<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoPension extends Migration
{
    public function up()
    {
        Schema::create('tipopension', function (Blueprint $table) {
            $table->increments('idtipopension');
            $table->string('nombre');
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tipopension');
    }
}
