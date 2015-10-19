<?php

use Illuminate\Database\Seeder;

class AlumnoEstadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estadoalumno')->insert(
            array(
                array(                    
                    'nombre' => 'Activo'                    
                ),
                array(                    
                    'nombre' => 'Retirado'                    
                ),
                array(                    
                    'nombre' => 'Suspendido'                    
                ),
                array(                    
                    'nombre' => 'Expulsado'                    
                )
            ));
    }
}
