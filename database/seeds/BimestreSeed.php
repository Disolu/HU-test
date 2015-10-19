<?php

use Illuminate\Database\Seeder;

class BimestreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bimestre')->insert(
            array(
                array(                    
                    'nombre' => 'I Bimestre'                    
                ),
                array(                    
                    'nombre' => 'II Bimestre'                    
                ),
                array(                    
                    'nombre' => 'III Bimestre'                    
                ),
                array(                    
                    'nombre' => 'VI Bimestre'                    
                )
            ));
    }
}
