<?php

use Illuminate\Database\Seeder;

class NivelSeed extends Seeder
{

  public function run()
  {
    DB::table('nivel')->insert(
    	array(
        	array(
        		'idsede'=>'1',
        		'usercreate'=> '1',
        		'nombre'=>'Inicial'
        		),
        	array(
        		'idsede'=>'1',
        		'usercreate'=> '1',
        		'nombre'=>'Primaria'
        		),
        	array(
        		'idsede'=>'1',
        		'usercreate'=> '1',
        		'nombre'=>'Secundaria'
        		),
        	array(
        		'idsede'=>'2',
        		'usercreate'=> '1',
        		'nombre'=>'Inicial'
        		),
        	array(
        		'idsede'=>'2',
        		'usercreate'=> '1',
        		'nombre'=>'Primaria'
        		),
        	array(
        		'idsede'=>'2',
        		'usercreate'=> '1',
        		'nombre'=>'Secundaria'
        		)
    ));
  }
}
