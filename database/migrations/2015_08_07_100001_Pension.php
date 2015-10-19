<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pension extends Migration
{
    public function up()
    {
        Schema::create('pension', function (Blueprint $table) {
            $table->increments('idpension');
            $table->integer('idtipopension')->unsigned();
            $table->integer('idnivel')->unsigned();
            $table->integer('idsede')->unsigned();
            $table->double('monto');
            $table->integer('idperiodomatricula')->unsigned();

            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->foreign('idtipopension')->references('idtipopension')->on('tipopension')->onUpdate('cascade');
            $table->foreign('idnivel')->references('idnivel')->on('nivel')->onUpdate('cascade');
            $table->foreign('idsede')->references('idsede')->on('sede')->onUpdate('cascade');
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('pension');
    }
}
