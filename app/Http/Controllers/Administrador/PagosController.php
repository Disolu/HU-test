<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Console\Commands\PaymentsCollector;
use Artisan;
use Auth;
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

        return view('administrador.pagos.index',compact('pagos'));
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
