<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReligionTable extends Migration
{
    public function up()
    {
        Schema::create('religion', function (Blueprint $table) {
            $table->increments('idreligion');
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('religion');
    }
}
