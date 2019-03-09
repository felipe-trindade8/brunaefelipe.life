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

Route::get('/', 'IndexController@index');
Route::post('/recado', 'IndexController@salvarRecado');
Route::get('/enviado', 'IndexController@enviado');
Route::get('/lista-presenca', 'IndexController@listaPresenca');
Route::get('/lista-presentes', 'IndexController@listaPresentes');
Route::post('/confirmar-presenca', 'IndexController@confirmarPresenca');
Route::get('/produto/{produto}', 'IndexController@getProduto');
Route::post('/pagamento', 'IndexController@pagamento');
Route::get('/pagamento/pagseguro', 'IndexController@pagseguro')->name('pagseguro.redirect');
Route::get('/pagamento/notificacao', 'IndexController@notificacao')->name('pagseguro.notification');
Route::get('/pagamento/finalizado', 'IndexController@finalizado');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
