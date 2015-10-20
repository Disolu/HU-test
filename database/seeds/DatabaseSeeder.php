<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();   
        $this->call(RolUsuarioSeed::class);
        $this->call(UsersSeed::class);
        $this->call(SedeSeed::class);
        $this->call(AlumnoEstadoSeed::class);      
        $this->call(DepartamentoSeed::class);
        $this->call(ProvinciaSeed::class);
        $this->call(DistritosSeed::class);      
        $this->call(TipoObservacionSeed::class);        
        $this->call(EstadoMatriculaSeed::class);
        $this->call(ReligionSeed::class);
        $this->call(BimestreSeed::class);
        Model::reguard();
    }
}
