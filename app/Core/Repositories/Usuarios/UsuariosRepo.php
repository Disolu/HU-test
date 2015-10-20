<?php
namespace App\Core\Repositories\Usuarios;
use App\Core\Entities\Usuarios;

class UsuariosRepo {
	//Registrar Usuario
    public function SaveUser($request)
    {
	  	$users = Usuarios::create([
            'nombre'=> $request['nombre'],
            'user'  => $request['user'],
            'email' => $request['email'],
            'idrol' => $request['idrol'],
            'password' => bcrypt($request['password'])
        ]);
        return $users;
    }
    public function getUsers()
    {
        $users = Usuarios::all();
        return $users;
    }
    public function getUser($id)
    {
        $users = Usuarios::find($id);
        return $users;
    }
    public function updateUser($request, $id)
    {
        $user = Usuarios::where('id', $id)
            ->update([
                'nombre'=> $request['nombre'],
                'user'  => $request['user'],
                'email' => $request['email'],
                'idrol' => $request['idrol'],
                'password' => bcrypt($request['password'])
            ]);
        return $user;
    }
    public function deleteUser($id)
    {
        $users = Usuarios::where('id', $id)->delete();
        return $users;
    }
}
