<?php

use Illuminate\Database\Seeder;

class DepartamentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert(
            array(
                array(                    
                    'nombre' => 'Lima'                    
                ),
                array(                    
                    'nombre' => 'Arequipa'                    
                )
            ));
    }
}