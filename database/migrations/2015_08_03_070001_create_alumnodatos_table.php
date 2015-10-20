<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnodatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnodatos', function (Blueprint $table) {
            $table->increments('idalumnodatos');
            $table->string('tiposangre');            
            $table->string('email');
            $table->string('qty_hermanos');
            $table->string('celular');
            $table->string('seguro');
            $table->string('foto');
            $table->string('thumbnail_foto');

            $table->integer('idreligion')->unsigned();
            $table->integer('idalumno')->unsigned();
            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idreligion')->references('idreligion')->on('religion')->onUpdate('cascade');
            
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
        Schema::drop('alumnodatos');
    }
}
