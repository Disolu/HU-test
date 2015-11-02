<?php

namespace App\Console\Commands;
use DB;
use Illuminate\Console\Command;

class PaymentsCollector extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:collect-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        //Name of file /home/altimea/Descargas/REC04893_02_09_2015.TXT
        $local_file_path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'REC04893_02_09_2015.TXT';

        $handle = fopen($local_file_path, "r") or die("Error al abrir archivo");
        $error_lines = array();
        $current_line = 0;

        /* $lengths = array(
            'campaign'           => 6,
            'transaction_number' => 15,
            'cod_sap'            => 18,
            'quantity'           => 7,
            'batch'              => 20
        );*/


        $lengths_first= array(
          'codclase'   =>  array(13,3),
          'tipmoneda'   =>   array(16,3),
          'fecproceso'   =>  array(19,8),
          'ctadestino'   =>   array(27,18),
        );

        $lengths_detail= array(

          'nomcliente'   => array(2,30),
          'refpago'   =>   array(32,48),
          'importeorigen'   =>  array(80,15),
          'importedestino'   =>   array(95,15),
          'importemora'   =>  array(110,15),
          'ofpago'   =>  array(125,4),
          'nummov'   =>   array(129,5),
          'fecpago'   =>   array(135,8),
          'tipovalor'   =>  array(143,2),
          'canalentrada'   => array(145,2),
        );

        $data_lineone=array();

        while ((($line = fgets($handle)) !== FALSE)) {

            $current_line++;

            if ($line == "\n") continue; //ignore blank lines

            $error_format = FALSE;
            $error_student = FALSE;

            //Obtener el array de variables de la linea
            $line_array=array();

            if ($current_line==1) {
                $line_array_first= $this->__splitString($line, $lengths_first);
                $data_lineone= $line_array_first;
            }

            if ($current_line!=1) {
                $line_array = $this->__splitString($line, $lengths_detail);   

                 $line_array= $data_lineone+$line_array;
          
                  $this->info(json_encode($line_array));

                 $this->__insertLine($line_array);
                
                  if ($current_line == 0) {
                      $this->empty_file = TRUE;
                  }
            }


                     if (!empty($error_lines)) {
            $lines = json_encode($error_lines);
            $message = <<<EOT
El archivo fue procesado correctamente pero se encontraron errores en las siguientes líneas:
$lines
Estos errores pueden ser de formato en la línea indicada, el resto de líneas fueron ingresadas correctamente.
EOT;
            $this->info($message);
            
        }

      }

      fclose($handle);  

            
    }

    protected function __insertLine($line_array)
    {
        $codclase     = trim($line_array['codclase']);
        $tipmoneda     = trim($line_array['tipmoneda']);
        $date_proceso = date_create_from_format('Ymd', $line_array['fecproceso']);
        $fecproceso     = $date_proceso->format('Y-m-d');
        $ctadestino     = trim($line_array['ctadestino']);
        
        $nomcliente     = rtrim($line_array['nomcliente']);
        $refpago     = trim($line_array['refpago']);
        $importeorigen     = (floatval($line_array['importeorigen'])/100);
        $importedestino     = (floatval($line_array['importedestino'])/100);
        $importemora     = floatval($line_array['importemora']);
        $ofpago     = trim($line_array['ofpago']);
        $nummov     = trim($line_array['nummov']);
        $date_pago = date_create_from_format('Ymd', $line_array['fecproceso']);
        $fecpago     = $date_pago->format('Y-m-d');
        $tipovalor     = trim($line_array['tipovalor']);
        $canalentrada     = trim($line_array['canalentrada']);



        /*if (empty($detail)) {
            return true;
        }*/

        DB::table('recepcionpagos')
          ->insert(array(
              'codclase' => $codclase,
              'tipmoneda' =>  $tipmoneda,
              'fecproceso' => $fecproceso,
              'ctadestino' => $ctadestino,
              'nomcliente' => $nomcliente,
              'refpago' => $refpago,
              'importeorigen' => $importeorigen,
              'importedestino' => $importedestino,
              'importemora' => $importemora,
              'ofpago' => $ofpago,
              'nummov' => $nummov,
              'fecpago' => $fecpago,
              'tipovalor' => $tipovalor,
              'canalentrada' => $canalentrada,
          ));

        return false;
    }

    protected function __splitString($string, $lengths)
    {
        $parts = array();

        foreach ($lengths as $key => $position)
        {
            $parts[$key] = substr($string,$position[0], $position[1]);
            //$string = substr($string, $position[1]);
        }

        return $parts;
    }

























}
