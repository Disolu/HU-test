<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsuariosRequest;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use App\Core\Repositories\Usuarios\UsuariosRepo;

class UsuariosController extends Controller
{
    protected $UsuariosRepo;
    private $path = "usuarios";
    public function __construct(UsuariosRepo $UsuariosRepo)
    {
        $this->UsuariosRepo = $UsuariosRepo;
    }

    public function create()
    {
        $usuarios = $this->UsuariosRepo->getUsers();
        return view($this->path.".index", compact('usuarios'));
    }

    public function store(UsuariosRequest $request)
    {
        $users = $this->UsuariosRepo->SaveUser($request->all());

        if($users){
            Session::flash('message-success', 'Se registro correctamente al usuario');            
            return redirect()->route('usuarios');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar al usuario');            
            return redirect()->route('usuarios');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->UsuariosRepo->getUser($id);
        return View($this->path.".edit", compact('user'));
    }

    public function update(Request $request, $id)
    {
        $users = $this->UsuariosRepo->updateUser($request->all(), $id);

        if($users){
            Session::flash('message-success', 'Se actualizo correctamente al usuario');            
            return redirect()->route('usuarios');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al actualizar al usuario');            
            return redirect()->route('usuarios');
        }
    }

    public function destroy($id)
    {
        $usuarios = $this->UsuariosRepo->deleteUser($id);
        if($usuarios)
        {
            Session::flash('message-success', 'El usuario ha sido eliminado');  
            return redirect()->route('usuarios');
        }
        else{
            return redirect()->back()->withInput(); 
        }       
    }
}
