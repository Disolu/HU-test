<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Console\Commands\PaymentsCollector;
use Artisan;
use App\Core\Entities\Sede;
use Auth;
use Response;
use DB;

class PagosController extends Controller
{
    protected $payment;

    public function __construct(PaymentsCollector $payment)
    {
        $this->payment = $payment;
    }

    public function index()
    {
        $pagos = DB::table('recepcionpagos')->paginate('10');
        $numeration = array('001503' =>1 , '004893'=>2 );
        $files = scandir(config('app.urlupload'));
        $payments = array();
        foreach($files as $f){
            if(strpos($f,'RC_') == 0 && strpos($f,'.TXT') !== FALSE){
                $payments[] = $f;
            }
        }
        
        foreach ($payments as &$p) {
            $name = explode('_',$p);
            $date = explode('.',$name[2]);
            $date = date('d-m-Y',strtotime($date[0]));
            $pay = new \stdClass();
            $pay->name = $p;
            $pay->date = $date;
            $pay->sede = Sede::where('idsede',$numeration[$name[1]])->first();
            $p = $pay;
        }


        return view('administrador.pagos.index',compact('pagos','payments'));
    }

    public function download(Request $request)
    {
        $name = $request->input('name');
        $file= config('app.urlupload'). $name;
        $headers = array(
              'Content-Type: application/txt',
            );
        return Response::download($file, $name, $headers);
    }



    public function store(Request $request)
    {
        $destinationPath = config('app.urlupload');
        $namevalidate = "RC_000_".date('Ymd').".TXT";

        $name = $request->file('files')->getClientOriginalName();
        $complete = $name;

        if($complete == $namevalidate)
        {
            $request->file('files')->move($destinationPath, $complete);
            
            Artisan::call('payments:collect-payments');
            Session::flash('message-success', 'tu archivo ha sido subido y procesado con éxito');
            return redirect()->route('bancoPagos');
        }
        else
        {
            Session::flash('message-danger', 'tu archivo no tiene el formato esperado');
            return redirect()->route('bancoPagos');
        } 
    }
}
