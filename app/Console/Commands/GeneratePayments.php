<?php

namespace App\Console\Commands;

use DB;
use File;
use Illuminate\Console\Command;




class GeneratePayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:generate-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate payments of students';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $numeration='000';
        $today=date('Ymd');
        $file_name  = "RC_{$numeration}_{$today}.TXT"; //  RC_000_YYYYMMDD.TXT

        $source_file      = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $file_name;

        $sedes= DB::table('sede')->get();


        foreach ($sedes as $key => $sede) {
             $header =""; // 01 20547453035 300 PEN 20151007 000   

            //RUC EMPRESA 20547453035
            //NRO RECAUDO 100
            //FECHA FACTURACION   08/04/2015
            //MONEDA  PEN
            //VERSION 000

            
            //One for file
            $header=str_pad($sede->idsede, 2, '0', STR_PAD_LEFT) .
                    '20547453035' .
                    '300' .
                    'PEN' .
                    str_pad($today, 8, ' ', STR_PAD_LEFT) .
                    $numeration .
                    PHP_EOL;

            $students= $this->getStudentsbySede($sede->idsede);

            if (!empty($students)) {
                foreach ($students as $key => $student) {
                    //For student and pension
                    $file_contents ="";

                    /* 02GOMEZ FERNANDEZ GAELA THAIS   HU2014-621PENSION SETIEMBRE                     201609302017123100000000000033000000000000033000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000L000000000000000                                    
                    */
                   $nombres_completos=strtoupper($student->nombres).' ';
                   
                    $line = array(
                                'sede'    => '01', //1
                                'nombre'     => , //2
                                'codigo'     => '01', //2 Movimientos
                                'meses'     => '  ', //2
                                'bldat'     => $date_full, //8
                                'bukrs'     => $country_code . '01', //4
                                'budat'     => $date_full, //8
                                'monat'     => $month, //2
                                'xblnr'     => str_pad($numeration, 16, '0', STR_PAD_LEFT), //16
                                'bktxt'     => str_pad('VENTA INTERNET', 25, ' ', STR_PAD_RIGHT), //25
                                'wrbtr'     => $print_untaxed, //15
                                'zfbdt'     => $date_full, //8
                                'zznegocio' => mb_substr(str_repeat(' ', 4) . $transaction->cod_negocio , -4, 4), //4
                                'zzmarca'   => mb_substr(str_repeat('0', 2) . $transaction->brand_id, -2, 2), //2
                                'zzperc'    => $campaign, //2
                                'zzejcom'   => $year, //4
                                'zuonr'     => str_pad('', 18, ' '), //18
                                'sgtxt'     => str_pad('VENTA INTERNET', 50, ' ', STR_PAD_RIGHT), //50
                                'prctr'     => PRCTR, //10
                            );
                    $file_contents .= implode($line) . PHP_EOL;

                }
            }
        }


        File::put($source_file, $file_contents);

    }


    private function getPayments(){
        
    }


    private function getStudentsbySede($sede){

       $query = DB::table('alumno')
                   ->select('alumno.*',DB::raw('alumnomatricula.*,pension.idpension,pension.monto'))
                   ->join('alumnomatricula', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
                   ->join('pension', 'pension.idpension', '=', 'alumnomatricula.idpension')
                   ->where('alumnomatricula.idsede', '=', $sede);
        return $query->get();

    }


    /*
    Un archivo por sede 
    verificar que el alunmo esté activo
    Los meses restantes por alumno , una linea cada uno
    */











    
}
