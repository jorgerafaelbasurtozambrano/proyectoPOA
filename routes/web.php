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
Route::get('/logueo',function()
{
  return view('nuevasvistas.login');
});

Route::get('nuevaconsulta','Areas@consulta');


Route::get('/administrador','PeriodoController@vista_administrador');
Route::get('/acceso','ProyectController@retornar_principal');
Route::resource('/notificacion','NotificacionModelController');
Route::get('alluser','NotificacionModelController@mostrar_usuarios');

Route::get('notificaciones/{id}','NotificacionModelController@buscar_comentarios');


Route::get('new','PeriodoController@index_nuevo');
Route::get('show','PeriodoController@listar_periodos');
Route::get('showreport','PeriodoController@report');
Route::get('evaluar_poa','AdmiController@principal_nuevo');


Route::get('newproject','ProyectController@crear1');
Route::get('showproject','ProyectController@mostrar_project');
Route::get('consulta/{idproyecto}','ProyectController@obtener_proyectos');
Route::get('lista', 'IndicadoresController@mostrar_indicador_nuevo');
Route::get('actualizar/{id}', 'IndicadoresController@obtener_datos');


Route::get('showmetas','MetaController@mostrar_tabla');
Route::resource('/meta','MetaController');
Route::get('periodos_dato/{id}', 'PeriodoController@datos');
Route::get('busca_meta/{id_meta}','MetaController@obtener_meta');
Route::get('evaluar','EvaluacionesMetasController@metas_evaluar');
Route::get('obtenerr','EvaluacionesMetasController@todas_metas');
Route::get('obtenerres/{id_meta}/{id_evaluacion}','EvaluacionesMetasController@todas_metas_especifico');
Route::get('evaluar_poa1','AdmiController@principal_nuevo1');
Route::resource('/meta_evaluar','EvaluacionesMetasController');


Route::post('add_comentario','MetaController@update_comentario');




Route::get('/', function () {
    $departamentos=\App\AreadesModel::all();
    $tipos=\App\tipo::all();
    return view('adminlte::auth.login',compact('departamentos','tipos'));
});
Route::get('/home2/crearproyecto','ProyectController@crear2');


Route::get('home1/subareas','AdmiController@sub');
Route::get('home1/obtener_subareas/{id}','AdmiController@buscar_subarea');

Route::get('area', 'Areas@conf_area');
Route::get('/home/obtener', 'Areas@consulta_db');
Route::resource('areadatos','Areas');

Route::get('/pro_ind/{idarea}/{idperiodo}', 'ProyectController@obtener_indicadores');

Route::get('home1/pro_in/{idperiodo}/{idsubarea}', 'ProyectController@obtener_indicadores1');


Route::get('/prueba1', 'IndicadoresController@extraer');
//Route::get('/home1/metas','MetaController@mostrar_principal');
//Route::get('/home2/metas','MetaController@mostrar_principal2');
Route::get('/buscar/{id?}','EvaluacionPoaController@buscar');
//Route::get('/home1', 'HomeController@index1');
//Route::get('/home2', 'HomeController@index2');
Route::resource('/periodo','PeriodoController');
Route::resource('/evaluapoa','EvaluacionPoaController');
//Route::get('/homes', 'HomeController@index');
Route::get('mostrar','PeriodoController@mostrar');
Route::get('crear','PeriodoController@crear');
Route::get('/evaluaciones/{eva_id?}','PeriodoController@mostrar_periodos');
Route::get('/prueba','PeriodoController@periodos_mostrar');
Route::get('/prueba1','PeriodoController@periodos_mostrar_todo');
Route::get('/pruebass/{id?}','PeriodoController@mostrar_todo');
Route::get('perio_mostr','PeriodoController@vista');

//Route::get('/home1/crearproyecto','ProyectController@crear');
//Route::get('/home1/mostrar_proyecto','ProyectController@mostrar');
//Route::get('/home2/mostrar_proyecto','ProyectController@mostrar2');
Route::resource('proyecto', 'ProyectController');
Route::resource('indicador', 'IndicadoresController');
//Route::get('/home1/mostrarindicador', 'IndicadoresController@mostrar_indicador');
//Route::get('/home2/mostrarindicador', 'IndicadoresController@mostrar_indicador2');

//Route::resource('home1/metass','MetaController');
//Route::resource('home2/metass','MetaController');
Route::get('/nuevo','MetaController@mostrar');
Route::get('/obtener','MetaController@ultimo');

Route::get('/muestra','IndicadoresController@obtener');

//Route::get('home1/consulta_meta/{id_meta}','MetaController@obtener_meta');
//Route::get('home2/consulta_meta/{id_meta}','MetaController@obtener_meta');

//Route::get('home1/meta_evaluacion','EvaluacionesMetasController@mostrar_metas');
//Route::get('home2/meta_evaluacion','EvaluacionesMetasController@mostrar_metas2');
//Route::resource('home1/meta_evaluar','EvaluacionesMetasController');
//Route::resource('home2/meta_evaluar','EvaluacionesMetasController');
//Route::get('home1/obtenerr','EvaluacionesMetasController@todas_metas');
//Route::get('home2/obtenerr','EvaluacionesMetasController@todas_metas');
//Route::get('home1/obtenerres/{id_meta}/{id_evaluacion}','EvaluacionesMetasController@todas_metas_especifico');


Route::get('mostrar_meta_eval','AdmiController@principal');
Route::resource('evaluaciones_','AdmiController');
//Route::resource('home1/evaluaciones_','AdmiController');

Route::get('reporte/{id_periodo}','ReportesController@periodos_evaluaciones');

Route::group(['middleware' => ['web','auth']], function () {
});
