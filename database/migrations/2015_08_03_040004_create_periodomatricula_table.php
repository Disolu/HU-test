<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodomatriculaTable extends Migration
{

    public function up()
    {
        Schema::create('periodomatricula', function (Blueprint $table) {
            $table->increments('idperiodomatricula');
            $table->string('nombre');            
            $table->datetime('inicio');
            $table->datetime('fin');

            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periodomatricula');
    }
}
