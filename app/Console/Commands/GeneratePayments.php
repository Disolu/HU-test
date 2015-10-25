<?php

namespace App\Console\Commands;

use DB;
use File;
use DateTime;
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

       $file_contents_final="";
        foreach ($sedes as $key => $sede) {
                   
            //One for file      

            $students= $this->getStudentsbySede($sede->idsede);


            if (!empty($students)) {

                 $file_contents ="";
                 $header ="";

                    $header=str_pad($sede->idsede, 2, '0', STR_PAD_LEFT) .
                    '20547453035' .
                    '300' .
                    'PEN' .
                    str_pad($today, 8, ' ', STR_PAD_LEFT) .
                    $numeration .
                    PHP_EOL;
                
                foreach ($students as $key => $student) {
                //For student and pension
                 
                   $ref_month= ($student->mes)+1;
                   $months_pending= $this->getPendingMonths($ref_month);
                   $nombres_completos=strtoupper($student->nombres).' '.strtoupper($student->apellido_paterno).' '.strtoupper($student->apellido_materno);


                  foreach ($months_pending as $key => $value) {
                       
                       $especificacion = strtoupper($student->codigo).'PENSION '.$value;

                        $line = array(
                                    'sede'      => str_pad($sede->idsede, "2","0",STR_PAD_LEFT), //2
                                    'nombre'    => str_pad($nombres_completos, '30'," ", STR_PAD_RIGHT), //30
                                    'especificacion' => str_pad($especificacion, '48'," ", STR_PAD_RIGHT), //48
                                    'relleno' => str_pad( " ", '208',"0", STR_PAD_RIGHT),
                        );
                        $file_contents .= implode($line) . PHP_EOL;
                   }

                }

                $footer="";

                $footer=str_pad(" ", "65","0",STR_PAD_LEFT). PHP_EOL;

                $file_contents_final.= $header.$file_contents.$footer. PHP_EOL;

                File::put($source_file, $file_contents_final);

            }
        
           

        }

        


    }


    private function getPayments(){
        
    }


    private function getStudentsbySede($sede){

       $query = DB::table('alumno')
                   ->select('alumno.*',DB::raw('alumnomatricula.*,pension.idpension,pension.monto,mensualidades.*'))
                   ->join('mensualidades', 'mensualidades.idalumno', '=', 'alumno.idalumno')
                   ->join('alumnomatricula', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
                   ->join('pension', 'pension.idpension', '=', 'alumnomatricula.idpension')
                   ->where('alumnomatricula.idsede', '=', $sede);
        return $query->get();

    }

    private function getPendingMonths($month){

        $months_array=array();

        for ($i=$month; $i<=12; $i++) { 
           
            $months_array[]=$this->getNameMonth($i);
        }

        return $months_array;

    }


    private function getNameMonth($monthNum){

        /*setlocale(LC_ALL,"es_ES@euro","es_ES","esp","ES_es","ES_ES");
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->getTimestamp();
        return strftime("%B");*/

        switch ($monthNum) {
            case 1:
                $th='ENERO';
                break;
            case 2:
                $th='FEBRERO';
                break;
            case 3:
                $th='MARZO';
                break;
            case 4:
                $th='ABRIL';
                break;
            case 5:
                $th='MAYO';
                break;
            case 6:
                $th='JUNIO';
                break;
            case 7:
                $th='JULIO';
                break;
            case 8:
                $th='AGOSTO';
                break;
            case 9:
                $th='SETIEMBRE';
                break;
            case 10:
                $th='OCTUBRE';
                break;
            case 11:
                $th='NOVIEMBRE';
                break;
            case 12:
                $th='DICIEMBRE';
                break;           
        }

        return $th;


    }

    

    
}
