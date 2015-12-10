<?php

namespace App\Console\Commands;

use DB;
use File;
use DateTime;
use DateInterval;
use Illuminate\Console\Command;

class GeneratePayments extends Command
{

    protected $signature = 'payments:generate-payments';
    protected $description = 'Generate payments of students';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
       $numeration = array('1' =>'001503' , '2'=>'004893' );
       $today=date('Ymd');
       
       $sedes= DB::table('sede')->get();
       $file_contents_final="";
        foreach ($sedes as $key => $sede) 
        {
          $file_name  = "RC_{$numeration[$sede->idsede]}_{$today}.TXT"; // RC_000_YYYYMMDD.TXT
          //$source_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $file_name;
          $source_file = config('app.urlupload').$file_name;       
          //One for file      
          $students= $this->getStudentsbySede($sede->idsede);

          if (!empty($students)) 
          {
            $file_contents ="";
            $header ="";

            if($sede->idsede == 1)
            {
              $header=str_pad($sede->idsede, 2, '0', STR_PAD_LEFT) .
              '20547453035' .
              '100' .
              'PEN' .
              str_pad($today, 8, ' ', STR_PAD_LEFT) .
              '000' .
              PHP_EOL;  
            }
            else
            {
              $header=str_pad($sede->idsede, 2, '0', STR_PAD_LEFT) .
              '20547453035' .
              '300' .
              'PEN' .
              str_pad($today, 8, ' ', STR_PAD_LEFT) .
              '000' .
              str_pad("T", 8, " ", STR_PAD_LEFT) .
              PHP_EOL;
            }

            $countreg=0;
            $sum_max=0;
            $sum_min=0;

            foreach ($students as $key => $student) 
            {
            //For student and pension
               $ref_month= ($student->mes)+1;
               $months_pending= $this->getPendingMonths($ref_month);
               $nombres_completos=strtoupper($student->nombres).' '.strtoupper($student->apellido_paterno).' '.strtoupper($student->apellido_materno);
               $decimal=100;

               foreach ($months_pending as $period => $nameMonth) 
               {
                  $codigo=str_pad($student->codigo, "10"," ",STR_PAD_LEFT);
                  $especificacion = strtoupper($codigo).$nameMonth;
                  $countreg++;
                  $year= date('Y');
                  $fec_ref= $year.'-'.$period.'-01';
                  $fec_ven = new DateTime( $fec_ref );
                  $last_day = $fec_ven->format( 'Ymt' );

                  $fec=$fec_ven->format('Y-m-d');
                  $fec_foo= new DateTime($fec_ref.'+1 year +1 months');
                  $fec_bloqueo=$fec_foo->format('Ymt');

                  $sum_max +=$student->monto;
                  $sum_min +=$student->monto;

                  $line = array(
                    'sede'           => str_pad('2', "2","0",STR_PAD_LEFT), //2
                    'nombre'         => str_pad($nombres_completos, '30'," ", STR_PAD_RIGHT), //30
                    'especificacion' => str_pad($especificacion, '48'," ", STR_PAD_RIGHT), //48
                    'fec_ven'        => str_pad($last_day, '8'," ", STR_PAD_RIGHT),
                    'fec_bloqueo'    => str_pad($fec_bloqueo, '8'," ", STR_PAD_RIGHT),
                    'periodo'        => str_pad("0", '2',"0", STR_PAD_LEFT),
                    'monto_max'      => str_pad(number_format($student->monto * $decimal, 0, '', ''), 15, '0', STR_PAD_LEFT),
                    'monto_min'      => str_pad(number_format($student->monto * $decimal, 0, '', ''), 15, '0', STR_PAD_LEFT), 
                    'relleno'        => str_pad( "0", '160',"0", STR_PAD_RIGHT),
                    'tail'           => str_pad( "0", '23',"0", STR_PAD_RIGHT),
                    'tail_'          => str_pad( "L", '16',"0", STR_PAD_RIGHT),
                  );
                  $file_contents .= implode($line) . PHP_EOL;
               }
            }

            $footer="03".str_pad($countreg, 9,"0",STR_PAD_LEFT).
            str_pad(number_format($sum_max * $decimal, 0, '', ''), 18, '0', STR_PAD_LEFT).
            str_pad(number_format($sum_min * $decimal, 0, '', ''), 18, '0', STR_PAD_LEFT).
            str_pad( "0", 18,"0", STR_PAD_LEFT). PHP_EOL;

            $file_contents_final.= $header.$file_contents.$footer. PHP_EOL;
            File::put($source_file, $file_contents_final);
          }
        }
    }

    private function getStudentsbySede($sede)
    {
      $query = DB::table('alumno')
       ->select('alumno.*',DB::raw('alumnomatricula.*,pension.idpension,pension.monto,mensualidades.*'))
       ->join('mensualidades', 'mensualidades.idalumno', '=', 'alumno.idalumno')
       ->join('alumnomatricula', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
       ->join('pension', 'pension.idpension', '=', 'mensualidades.idpension')
       ->where('alumnomatricula.idsede', '=', $sede);
      return $query->get();
    }

    private function getPendingMonths($month)
    {
      $months_array=array();
      for ($i=$month; $i<=12; $i++) 
      { 
        $period= str_pad($i,"2","0", STR_PAD_LEFT);
        $months_array[$period]=$this->getNameMonth($i);
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
