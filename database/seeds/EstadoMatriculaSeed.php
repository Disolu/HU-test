<?php

use Illuminate\Database\Seeder;

class EstadoMatriculaSeed extends Seeder
{
    public function run()
    {
        DB::table('estadomatricula')->insert(
            array(
                array(                    
                    'nombre' => 'Pendiente de Pago'           
                ),
                array(                    
                    'nombre' => 'Matriculado'                   
                ),
                array(                    
                    'nombre' => 'Declinado'                  
                ),
            ));
    }
}
