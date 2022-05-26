<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;
class UsuarioController extends Controller
{
    public function usuario(){
        return view('site.usuario');
    }

    public function create(Request $request){
        UsuariosModel::create([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
        ]);

        return 'User criado com sucesso';

    }

    public function VisualizarUsuarios($id){
        $usuario = UsuariosModel::findOrFail($id);
        return view('site.ViewUsers',['users'=>$usuario]);
    }

    public function edit($id){
        $usuario = UsuariosModel::findOrFail($id);
        return view('site.editUsers',['users'=>$usuario]);
    }

    public function AtualizarUsuario(Request $request,$id){
        $usuario = UsuariosModel::findOrFail($id);
        $usuario->update([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
        ]);
        return 'Usuario atualizado';
    }

    public function delete($id){
        $usuario = UsuariosModel::findOrFail($id);
        return view('site.deleteUser',['usuario'=>$usuario]);
    }

    public function destroy($id){
        $usuario = usuariosModel::findOrFail($id);
        $usuario->delete();
        return 'Usuário excluido com sucesso';
    } 

    public function VerTodosUsuarios(){
        $usuario = UsuariosModel::all();
        return view('site.VisualizarTodosUsuarios',['usuario'=>$usuario]);
    }
    
}
