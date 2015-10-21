<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TarjetaBloqueCriterios extends Migration
{

    public function up()
    {
        Schema::create('tarjetabloque_criterios', function (Blueprint $table) {
            $table->increments('idbloquecriterio');
            $table->string('criterio');

            $table->integer('idtarjetabloque')->unsigned();
            $table->foreign('idtarjetabloque')->references('idtarjetabloque')->on('tarjetabloque')->onUpdate('cascade');
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tarjetabloque_criterios');
    }
}
