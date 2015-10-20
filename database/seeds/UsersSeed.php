<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{

    public function run()
    {
            DB::table('users')->insert(
            array(
                array(                    
                    'nombre' => 'Juan Carlos',                    
                    'user' => 'admin',
                    'email'=> 'carlox16@gmail.com',
                    'idrol'=> '1',
                    'password' => bcrypt('123456')
                )
            ));
    }
}
