<?php

use Illuminate\Database\Seeder;

class ReligionSeed extends Seeder
{
    public function run()
    {
        DB::table('religion')->insert(
            array(

                array(                    
                    'nombre' => 'Catolica'                                      
                ),
                array(                    
                    'nombre' => 'Cristiana'                                      
                ),
                array(                    
                    'nombre' => 'Testigo de Jehova'                                      
                ),
                array(                    
                    'nombre' => 'Mormon'                                      
                ),
                array(                    
                    'nombre' => 'Dios Madre'                                      
                ),
                array(                    
                    'nombre' => 'Adventista'                                      
                ),
                array(                    
                    'nombre' => 'Israeli'                                      
                ),
                array(                    
                    'nombre' => 'Judia'                                      
                ),
                array(                    
                    'nombre' => 'Otra'                                      
                ),
                array(                    
                    'nombre' => 'Ninguna'                                      
                )
            ));
    }
}
