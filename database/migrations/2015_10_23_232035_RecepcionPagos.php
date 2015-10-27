<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecepcionPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcionpagos', function (Blueprint $table) {
            $table->increments('idrecepcionpagos');
            $table->integer('codclase');
            $table->string('tipmoneda');
            $table->dateTime('fecproceso');
            $table->string('ctadestino');
            $table->string('nomcliente');
            $table->string('refpago');
            $table->double('importeorigen', 13, 2);
            $table->double('importedestino', 13, 2);
            $table->double('importemora', 13, 2);
            $table->integer('ofpago');
            $table->integer('nummov');
            $table->dateTime('fecpago');
            $table->integer('tipovalor');
            $table->integer('canalentrada');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
