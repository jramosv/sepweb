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
    return view('layout.admin.admin');
});

Route::get('/pacientes/crear', 'PatientController@create');
Route::post('/pacientes', 'PatientController@store');

Route::get('/transacciones', 'TransactionsController@index');
