<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('Usuario', 'UsuarioController@create');

Route::get('VisualizarUsuario','UsuarioController@VerTodosUsuarios');

Route::put('AlterarUser/{id}','UsuarioController@AtualizarUsuario');

Route::delete('excluirUsuario/{id}','UsuarioController@destroy');


Route::get('VisualizarVeiculo','VeiculosController@VerTodosVeiculos');

Route::post('veiculo','VeiculosController@createVeiculo');

Route::delete('deleteVeiculo/{id}','VeiculosController@destroyVeiculos');

Route::put('AlterarVeiculo/{id}','VeiculosController@AtualizarVeiculos');