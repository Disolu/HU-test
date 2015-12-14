<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotaTutoria extends Migration
{
  public function up()
  {
    Schema::create('notatutoria', function (Blueprint $table) {
        $table->increments('idnotatutoria');
        $table->char('apreciacion',2)->nullable();
        $table->char('respeto',2)->nullable();
        $table->char('puntualidad',2)->nullable();
        $table->char('responsabilidad',2)->nullable();
        $table->char('presentacion',2)->nullable();
        $table->char('tardanza_justificada',2)->nullable();
        $table->char('tardanza_injustificada',2)->nullable();
        $table->char('inasistencia_just',2)->nullable();
        $table->char('inasistencia_injust',2)->nullable();
        $table->char('avance',2)->nullable();
        $table->char('materiales',2)->nullable();
        $table->char('reuniones',2)->nullable();
        $table->char('higene',2)->nullable();
        $table->char('agenda',2)->nullable();

        $table->integer('idbimestre')->unsigned();
        $table->integer('idperiodomatricula')->unsigned();
        $table->integer('idtutor')->unsigned();
        $table->integer('idalumno')->unsigned();

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
    Schema::drop('notatutoria');
  }
}
