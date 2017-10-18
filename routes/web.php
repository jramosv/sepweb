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

Route::get('/pacientes', 'PatientController@index');
<<<<<<< HEAD
Route::get('/pacientes/crear', 'PatientController@create');
Route::post('/pacientes', 'PatientController@store');

=======

Route::get('/crear', 'PatientController@create');

Route::get('/morros', function(){
	return "Morros";
});
>>>>>>> 88d34dfdfe93daec6a692da5cb56fbe718bc37c6
