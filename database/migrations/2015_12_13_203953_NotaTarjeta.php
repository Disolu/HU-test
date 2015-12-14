<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotaTarjeta extends Migration
{
  public function up()
  {
    Schema::create('notatarjeta', function (Blueprint $table) {
      $table->increments('idnotatarjeta');
      $table->char('S',2);
      $table->char('CS',2);
      $table->char('AV',2);
      $table->char('N',2);

      $table->integer('idtarjeta')->unsigned();
      $table->integer('idbloque')->unsigned();
      $table->integer('idbloquecriterio')->unsigned();
      $table->integer('idbimestre')->unsigned();
      $table->integer('idperiodomatricula')->unsigned();
      $table->integer('idtutor')->unsigned();
      $table->integer('idalumno')->unsigned();

      $table->foreign('idtarjeta')->references('idtarjeta')->on('tarjeta')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('idbloque')->references('idbloque')->on('bloque')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('idbloquecriterio')->references('idbloquecriterio')->on('tarjetabloque_criterios')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('idbimestre')->references('idbimestre')->on('bimestre')->onDelete('cascade')->onUpdate('cascade');         
      $table->foreign('idperiodomatricula')->references('idperiodomatricula')->on('periodomatricula')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('idtutor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('idalumno')->references('idalumno')->on('alumno')->onDelete('cascade')->onUpdate('cascade');

      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::drop('notatarjeta');
  }
}
