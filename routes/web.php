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
Route::get('/pacientes/crear', 'PatientController@create');
Route::post('/pacientes', 'PatientController@store');
Route::get('/pacientes/{id}', 'PatientController@edit');
Route::put('/pacientes/{patient}', 'PatientController@update');
Route::delete('/pacientes/{patient}', 'PatientController@destroy');


Route::get('/transacciones', 'TransactionsController@index');

Route::get('/detalletransacciones', 'TransactionDetailsController@index');
Route::get('/detalletransacciones/crear', 'TransactionDetailsController@create');
Route::post('/detalletransacciones', 'TransactionDetailsController@store');
Route::get('/detalletransacciones/{id}', 'TransactionDetailsController@edit');
Route::put('/detalletransacciones/{patient}', 'TransactionDetailsController@update');
Route::delete('/detalletransacciones/{transaction_detail}', 'TransactionDetailsController@destroy');

Route::get('/suministros', 'SuppliesController@index');
Route::get('/suministros/crear', 'SuppliesController@create');
Route::post('/suministros', 'SuppliesController@store');

Route::get('/enfermeras', 'NursesController@index');
Route::get('/enfermeras/crear', 'NursesController@create');
Route::post('/enfermeras', 'NursesController@store');
Route::get('/enfermeras/{id}', 'NursesController@edit');
Route::put('/enfermeras/{nurse}', 'NursesController@update');
Route::delete('/enfermeras/{nurse}', 'NursesController@destroy');

Route::get('/doctores', 'DoctorsController@index');
Route::get('/doctores/crear', 'DoctorsController@create');
Route::post('/doctores', 'DoctorsController@store');
Route::get('/doctores/{id}', 'DoctorsController@edit');
Route::put('/doctores/{doctor}', 'DoctorsController@update');
Route::delete('/doctores/{doctor}', 'DoctorsController@destroy');

Route::get('/especialidades', 'SpecialtiesController@index');
Route::get('/especialidades/crear', 'SpecialtiesController@create');
Route::post('/especialidades', 'SpecialtiesController@store');
Route::get('/especialidades/{id}', 'SpecialtiesController@edit');
Route::put('/especialidades/{specialty}', 'SpecialtiesController@update');
Route::delete('/especialidades/{specialty}', 'SpecialtiesController@destroy');