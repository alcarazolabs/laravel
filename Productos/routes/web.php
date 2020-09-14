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
    return view('welcome');
});
Route::resource('producto', 'ProductosController');

Route::resource('categoria', 'CategoriasController');

Route::get('/cancelar_categoria', function(){
    return redirect()->route('categoria.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_categoria');
//Las siguientes rutas ejecutan el metodo @confirm que esta en el controlador CategoriasController y ProductosController
Route::get('/categoria/{id}/confirm','CategoriasController@confirm')->name('categoria.confirm');
Route::get('/producto/{id}/confirm','ProductosController@confirm')->name('producto.confirm');

Route::get('/cancelar_producto', function(){
    return redirect()->route('producto.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_producto');
