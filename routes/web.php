<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('produtos');
});

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/alterar/{id}', 'ProdutoController@alterar')->where('id', '[0-9]+');

Route::post('/produtos/alteracao', 'ProdutoController@alteracao');

// Route::post('/produtos/alterar', 'ProdutoController@alterar');
//id opcional
// Route::get('/produtos/mostra/{id?}', 'ProdutoController@mostra');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::post('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

//exemplos de rotas nomeadas
// Route::get('/produtos', [
//   'as' => 'apelido',
//   'uses' => 'ProdutoController@lista'
// ]);
// dessa forma o redirect pode ser return redirect()->route('apelido');
