<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado', function (Blueprint $table) {
            $table->increments('idgrado');
            $table->string('nombre');
            $table->integer('idnivel')->unsigned();
            $table->integer('idsede')->unsigned();
            $table->foreign('idnivel')->references('idnivel')->on('nivel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idsede')->references('idsede')->on('sede')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::drop('grado');
    }
}
