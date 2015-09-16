<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Profesor
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->idrol) 
        {
            case '1':
                # Administrador 
                return redirect()->to('admin');               
                break;

            case '2':
                # Responsable de Área
                return redirect()->to('responsable');  
                break;

            case '3':
                # Secretaria
                return redirect()->to('secretaria');  
                break;

            case '4':
                # Profesor
                //return redirect()->to('profesor');  
                break;

            case '5':
                # Área Legal
                return redirect()->to('legal');  
                break;

            default:
                return redirect()->to('/');  
                break;
        }                
            
        return $next($request);
    }
}
