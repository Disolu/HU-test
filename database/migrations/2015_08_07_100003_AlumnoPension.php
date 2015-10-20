<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoPension extends Migration
{
    public function up()
    {
        Schema::create('alumnopension', function (Blueprint $table) {
            $table->increments('idalumnopension');
            $table->integer('idpension')->unsigned();
            $table->foreign('idpension')->references('idpension')->on('pension')->onUpdate('cascade');                                    
            
            $table->integer('usercreate')->unsigned();
            $table->foreign('usercreate')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('userupdate');

            $table->integer('idalumno')->unsigned();
            $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');            

            $table->integer('idperiodomatricula')->unsigned();
            $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onDelete('cascade')->onUpdate('cascade');            
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('alumnopension');
    }
}
