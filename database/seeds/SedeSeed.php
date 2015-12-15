<?php
use Illuminate\Database\Seeder;
class SedeSeed extends Seeder
{

    public function run()
    {
      DB::table('sede')->insert(
      	array(
          	array(
          		'nombre'=>'2do Sector',
          		'usercreate'=> '1',
          		'sede_direccion'=>'Villa El Salvador'
          		),
          	array(
          		'nombre'=>'Sede Brisas',
          		'usercreate'=> '1',
          		'sede_direccion'=>'Villa El Salvador'
          		)
      ));
    }
}