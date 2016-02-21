<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Hash;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function home()
    {
        return view('administrador.index');
    }

    public function postLogin(LoginRequest $request)
    {
        if(Auth::attempt(['user' => $request['username'], 'password' => $request['password'] ],$request['remember']))
        {
            return Redirect::to('/');
        }
        Session::flash('message-danger', 'Los datos son incorrectos');
        return Redirect::to('/');
    }

    public function getLogin()
    {
        return view('authentication.index');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
