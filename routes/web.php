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

Route::get('/home', function () {
    return view('layout.admin.admin');
});

Route::middleware(['api', 'cors'])->group(function () {
    Route::delete('/pacientes/{patient}', 'PatientController@destroy');

});

Route::get('/pacientes', 'PatientController@index');
Route::get('/pacientes/crear', 'PatientController@create');
Route::post('/pacientes', 'PatientController@store');
Route::get('/pacientes/{id}', 'PatientController@edit');
Route::get('/pacientes_lista', 'PatientController@getPatientsData');
Route::get('/pacientes_todos_pdf', 'PatientController@listarPacientesPdf');
Route::put('/pacientes/{patient}', 'PatientController@update');


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
Route::get('/suministros/{id}', 'SuppliesController@edit');
Route::put('/suministros/{supply}', 'SuppliesController@update');
Route::delete('/suministros/{supply}', 'SuppliesController@destroy');

Route::get('/enfermeras', 'NursesController@index');
Route::get('/enfermeras/crear', 'NursesController@create');
Route::post('/enfermeras', 'NursesController@store');
Route::get('/enfermeras/{id}', 'NursesController@edit');
Route::put('/enfermeras/{nurse}', 'NursesController@update');
Route::delete('/enfermeras/{nurse}', 'NursesController@destroy');
Route::get('/enfermeras_lista', 'NursesController@getNursesData');
Route::get('/enfermeras_todos_pdf', 'NursesController@listarEnfermerasPdf');


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

Route::get('/habitaciones', 'RoomsController@index');
Route::get('/habitaciones/crear', 'RoomsController@create');
Route::post('/habitaciones', 'RoomsController@store');
Route::get('/habitaciones/{id}', 'RoomsController@edit');
Route::put('/habitaciones/{room}', 'RoomsController@update');
Route::delete('/habitaciones/{room}', 'RoomsController@destroy');

Route::get('/hospitalizaciones', 'HospitalizationsController@index');
Route::get('/hospitalizaciones/crear', 'HospitalizationsController@create');
Route::post('/hospitalizaciones', 'HospitalizationsController@store');
Route::get('/hospitalizaciones/{id}', 'HospitalizationsController@edit');
Route::put('/hospitalizaciones/{hospitalization}', 'HospitalizationsController@update');
Route::delete('/hospitalizaciones/{hospitalization}', 'HospitalizationsController@destroy');
Route::get('/hospitalizaciones_lista', 'HospitalizationsController@getHospitalizationData');
Route::get('/hospitalizaciones_todos_pdf', 'HospitalizationsController@listarHospitalizacionesPdf');

Route::get('/transacciones', 'TransactionsController@index');
Route::get('/transacciones/crear', 'TransactionsController@create');
Route::post('/transacciones', 'TransactionsController@store');
Route::get('/transacciones/{id}', 'TransactionsController@edit');
Route::put('/transacciones/{transaction}', 'TransactionsController@update');
Route::delete('/transacciones/{transaction}', 'TransactionsController@destroy');

Route::get('/citas', 'MedicalAppointmentsController@index');
Route::get('/citas/crear', 'MedicalAppointmentsController@create');
Route::post('/citas', 'MedicalAppointmentsController@store');
Route::get('/citas/{id}', 'MedicalAppointmentsController@edit');
Route::get('/citas_lista', 'MedicalAppointmentsController@getMedicalAppointmentData');
Route::get('/citas_todas_pdf', 'MedicalAppointmentsController@listarCitasPdf');
Route::put('/citas/{medical_appointment}', 'MedicalAppointmentsController@update');
Route::delete('/citas/{medical_appointment}', 'MedicalAppointmentsController@destroy');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/diagnosticos', 'MedicalDiagnosticsController@index');
Route::get('/diagnosticos/crear', 'MedicalDiagnosticsController@create');
Route::post('/diagnosticos', 'MedicalDiagnosticsController@store');
Route::get('/diagnosticos/{id}', 'MedicalDiagnosticsController@edit');
Route::get('/diagnosticos_lista', 'MedicalDiagnosticsController@getMedicalDiagnosticsData');
Route::get('/diagnosticos_todos_pdf', 'MedicalDiagnosticsController@listarDiagnosticosPdf');
Route::put('/diagnosticos/{Medical_Diagnostic}', 'MedicalDiagnosticsController@update');
Route::delete('/diagnosticos/{Medical_Diagnostic}', 'MedicalDiagnosticsController@destroy');
/**
*	Rutas para todo lo relacionado con bodega e inventario
*/
Route::get('/farmacia', 'ProductsController@index');

/**
*	Rutas para todo lo relacionado con categorias
*/
Route::get('/categorias', 'CategoriesController@index');
Route::get('/categorias/crear', 'CategoriesController@create');
Route::post('/categorias', 'CategoriesController@store');
Route::get('/categorias/{id}', 'CategoriesController@edit');
Route::put('/categorias/{category}', 'CategoriesController@update');
Route::delete('/categorias/{category}', 'CategoriesController@destroy');

/**
*	Rutas para todo lo relacionado con productos
*/
Route::get('/productos', 'ProductsController@index');
Route::get('/productos/crear', 'ProductsController@create');
Route::post('/productos', 'ProductsController@store');
Route::get('/productos/{id}', 'ProductsController@edit');
Route::put('/productos/{product}', 'ProductsController@update');
Route::delete('/productos/{product}', 'ProductsController@destroy');

/**
*	Rutas para todo lo relacionado con proveedores
*/
Route::get('/proveedores', 'ProvidersController@index');
Route::get('/proveedores/crear', 'ProvidersController@create');
Route::post('/proveedores', 'ProvidersController@store');
Route::get('/proveedores/{id}', 'ProvidersController@edit');
Route::put('/proveedores/{provider}', 'ProvidersController@update');
Route::delete('/proveedores/{provider}', 'ProvidersController@destroy');

/**
*	Rutas para todo lo relacionado con compras
*/
Route::get('/compras', 'PurchasesController@index');
Route::get('/compras/crear', 'PurchasesController@create');
Route::post('/compras', 'PurchasesController@store');
Route::delete('/compras/{purchase}', 'PurchasesController@destroy');

/**
*	Rutas para todo lo relacionado con farmacia/recetas
*/
Route::get('/recetas', 'RecipesController@index');
Route::get('/recetas/crear', 'RecipesController@create');
Route::post('/recetas', 'RecipesController@store');
Route::delete('/recetas/{recipe}', 'RecipesController@destroy');
Route::put('/diagnosticos/{medical_diagnostic}', 'MedicalDiagnosticsController@update');
Route::delete('/diagnosticos/{medical_diagnostic}', 'MedicalDiagnosticsController@destroy');
