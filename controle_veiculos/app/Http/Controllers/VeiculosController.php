<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VeiculosModel;

class VeiculosController extends Controller
{
    public function veiculo(){
        return view('site.veiculo.veiculo');
    }
    public function createVeiculo(Request $request){
        VeiculosModel::create([
            'placa'=>$request->placa,
            'marca'=>$request->marca,
            'cor'=>$request->cor,
            'ano'=>$request->ano,
            'modelo'=>$request->modelo,
        ]);

        return 'Veiculo criado com sucesso';

    }

    public function VisualizarVeiculos($id){
        $veiculo = VeiculosModel::findOrFail($id);
        return view('site.veiculo.VisualizarVeiculo',['veiculo'=>$veiculo]);
    }

    public function editarVeiculos($id){
        $veiculo = VeiculosModel::findOrFail($id);
        return view('site.veiculo.editarVeiculo',['veiculo'=>$veiculo]);
    }

    public function AtualizarVeiculos(Request $request,$id){
        $veiculo = VeiculosModel::findOrFail($id);
        $veiculo->update([
            'marca'=>$request->marca,
            'cor'=>$request->cor,
            'ano'=>$request->ano,
            'modelo'=>$request->modelo,
        ]);
        return 'veiculo atualizado';
    }

    public function deleteVeiculos($id){
        $veiculo = VeiculosModel::findOrFail($id);
        return view('site.veiculo.excluirVeiculo',['veiculo'=>$veiculo]);
    }

    public function destroyVeiculos($id){
        $veiculo = VeiculosModel::findOrFail($id);
        $veiculo->delete();
        return 'Veiculo excluido com sucesso';
    } 
}
