<?php
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});


Route::get('/visualizarTodosVeiculos','VeiculosController@VerTodosVeiculos')->name('VerTodosVeiculos');
Route::get('/veiculo', 'VeiculosController@veiculo');
Route::post('/veiculo','VeiculosController@createVeiculo')->name('criar_veiculo');
Route::get('/visualizarVeiculo/{id}','VeiculosController@VisualizarVeiculos');
Route::get('/editarVeiculos/{id}','VeiculosController@editarVeiculos');
Route::post('/editarVeiculos/{id}','VeiculosController@AtualizarVeiculos')->name('edit_veiculos');
Route::get('/excluirVeiculos/{id}','VeiculosController@deleteVeiculos');
Route::post('/excluirVeiculos/{id}','VeiculosController@destroyVeiculos')->name('excluirVeiculo');

Route::get('/visualizarTodosUsuarios','UsuarioController@VerTodosUsuarios');
Route::get('/usuario', 'UsuarioController@usuario');
Route::get('/visualizarUsuario/{id}','UsuarioController@VisualizarUsuarios');
Route::post('/usuario', 'UsuarioController@create')->name('criar_usuario');
Route::get('/editarUsuario/{id}','UsuarioController@edit');
Route::post('/editarUsuario/{id}','UsuarioController@AtualizarUsuario')->name('edit');
Route::get('/excluirUsuario/{id}','UsuarioController@delete');
Route::post('/excluirUsuario/{id}','UsuarioController@destroy')->name('excluirUsuario');

Route::get('/teste',function(){
    return view('teste');
})
?>
