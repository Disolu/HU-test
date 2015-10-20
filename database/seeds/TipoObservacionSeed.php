<?php

use Illuminate\Database\Seeder;

class TipoObservacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoobservacion')->insert(
            array(
                array(                    
                    'nombre' => 'Leve'                    
                ),
                array(                    
                    'nombre' => 'Moderado'                    
                ),
                array(                    
                    'nombre' => 'Grave'                    
                ),
                array(                    
                    'nombre' => 'Impedimento'                    
                )
            ));
    }
}
