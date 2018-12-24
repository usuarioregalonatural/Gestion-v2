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

//Auth::routes();
Auth::routes(['verify' => true, 'register' => false]);
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('home', function () {return view('inicio');});

// Mostrar todos los clientes
Route::get('/ver_clientes', function (){
    return view('clientes/ver_clientes');
});

// Agregar nuevo cliente
Route::post('/ver_clientes', function (Request $request){
    $validator=Validator::make($request->all(),[
        'nombre' => 'required|max:255',
        ]);
    if ($validator->fails()){
        return redirect('/ver_clientes')
            ->withInput()
            ->withErrors($validator);
    }
    $cliente = new Cliente;
    $cliente ->nombre = $request->nombre;
    $cliente ->save();

    return redirect('/ver_clientes');

});

// Eliminar cliente
Route::delete('/cliente/{id}', function ($id){
});

Route::get('/proveedores', 'ProveedoresController@create');
Route::post('/proveedores', 'ProveedoresController@store');

