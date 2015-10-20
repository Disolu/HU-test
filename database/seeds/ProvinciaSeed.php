<?php

use Illuminate\Database\Seeder;

class ProvinciaSeed extends Seeder
{

    public function run()
    {
        DB::table('provincia')->insert(
            array(

                array(                    
                    'nombre' => 'Lima',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Barranca',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Cajatambo',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Canta',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Cañete',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Huaral',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Huarochirí',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Huaura',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Oyon',
                    'iddepartamento' => '1'                    
                ),
                array(                    
                    'nombre' => 'Yuayos',
                    'iddepartamento' => '1'                     
                )
            ));
    }
}
