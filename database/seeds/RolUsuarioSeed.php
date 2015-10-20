<?php
use Illuminate\Database\Seeder;

class RolUsuarioSeed extends Seeder
{
    public function run()
    {
        DB::table('roluser')->insert(
            array(
                array(                    
                    'nombre' => 'Administrador'                    
                ),
                array(                    
                    'nombre' => 'Responsable de Área'                    
                ),
                array(                    
                    'nombre' => 'Secretaria'                    
                ),
                array(                    
                    'nombre' => 'Profesor'                    
                ),
                array(                    
                    'nombre' => 'Área Legal'                    
                )
            ));
    }
}
