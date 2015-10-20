<?php

use Illuminate\Database\Seeder;

class DistritosSeed extends Seeder
{

    public function run()
    {
        DB::table('distrito')->insert(
            array(
                array(                    
                    'nombre' => 'Villa el Salvador',
                    'idprovincia' => '1'                    
                ),
                array(                    
                    'nombre' => 'Villa Maria del Triunfo',
                    'idprovincia' => '1'                    
                ),
                array(                    
                    'nombre' => 'San Juan',
                    'idprovincia' => '1'                    
                ),
            ));
    }
}
