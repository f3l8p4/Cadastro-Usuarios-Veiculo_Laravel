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

        return response()->json();

    }

    public function VisualizarUsuarios($id){
        $usuario = UsuariosModel::findOrFail($id);
        return response()->json($usuario,200);
    }

    public function edit($id){
        $usuario = UsuariosModel::findOrFail($id);
        return response()->json($usuario,200);
    }

    public function AtualizarUsuario(Request $request,$id){
        $usuario = UsuariosModel::findOrFail($id);
        $usuario->update([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
        ]);
    }

    public function delete($id){
        $usuario = UsuariosModel::findOrFail($id);
        return response()->json('O produto foi removido com sucesso', 200);
    }

    public function destroy($id){
        $usuario = usuariosModel::findOrFail($id);
        $usuario->delete();
    } 

    public function VerTodosUsuarios(){
        $usuario = UsuariosModel::all();
        return response()->json($usuario,201);
    }
    
}
