<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use DB;
use Auth;

class TutoriaController extends Controller
{
    
    public function register()
    {
        return view('tutoria.index');
    }
}
