<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
Route::get('/', function()
{
    return View::make('app', array('name' => 'Taylor'));
});
Route::get('/index.php', function()
{
    return View::make('app', array('name' => 'Taylor'));
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::resource('nerds', 'NerdController');

Route::resource('estaciones', 'Tb_estacionesController');
Route::resource('departamento', 'Tb_departamentoController');

Route::resource('documentos', 'DocumentController');

Route::resource('directorio', 'DirectorioController');
/*
 * reportes ini
 */
Route::get('reporte1/{id}/{accion_in}', 'ReporteController@reporte1');
Route::get('reporte2/{ini_day}/{end_day}/{tipo}', 'ReporteController@reporte2');
Route::get('reporte3/{id}/{accion_in}', 'ReporteController@reporte3');
Route::get('reporte_h/{fechaIni}/{fechaFin}', 'ReporteController@reporteHistorial');
Route::get('reporte_m/{id_user}', 'ReporteController@reporteHistorial');
Route::get('reporte_total/{ini_day}/{end_day}/{tipo}', 'ReporteController@reporteTotal');
Route::get('reporte_total', 'ReporteController@reporteTotal');
/*
 * reporte fin
 */
/**
 * logs
 */
Route::get('log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
/**
 * pdf impresion
 */
Route::get('pdf', 'PdfController@invoice');