<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('App\Http\Controllers\Site')->group( function () {
  Route::get('/', 'PipelineController@index')->name('site.home');
  Route::get('pipeline/ficha/{id}', 'PipelineController@show')->name('site.pipeline.ficha');
  Route::get('pipeline/novo', 'PipelineController@create')->name('site.pipeline.novo');
  Route::post('pipeline/novoconfirma', 'PipelineController@store')->name('site.pipeline.novoconfirma');
  Route::get('pipeline/editar/{id}', 'PipelineController@edit')->name('site.pipeline.editar');
  Route::post('pipeline/editar', 'PipelineController@update')->name('site.pipeline.editconfirma');
  Route::get('pipeline/excluir/{id}', 'PipelineController@destroy')->name('site.pipeline.excluir');
  Route::get('action/ficha/{id}', 'ActionController@show')->name('site.action.ficha');
  Route::get('action/novo/{id}', 'ActionController@create')->name('site.action.novo');
  Route::post('action/novoconfirma', 'ActionController@store')->name('site.action.novoconfirma');
  Route::get('action/editar/{id}', 'ActionController@edit')->name('site.action.editar');
  Route::put('action/editar', 'ActionController@update')->name('site.action.editconfirma');
  Route::get('action/excluir/{id}', 'ActionController@destroy')->name('site.action.excluir');
  Route::get('action/up/{id}', 'ActionController@up')->name('site.action.up');
  Route::get('action/down/{id}', 'ActionController@down')->name('site.action.down');
  Route::get('task/ficha/{id}', 'TaskController@show')->name('site.task.ficha');
  Route::get('task/novo/{id}', 'TaskController@create')->name('site.task.novo');
  Route::post('task/novoconfirma', 'TaskController@store')->name('site.task.novoconfirma');
  Route::get('task/editar/{id}', 'TaskController@edit')->name('site.task.editar');
  Route::put('task/editar', 'TaskController@update')->name('site.task.editconfirma');
  Route::get('task/excluir/{id}', 'TaskController@destroy')->name('site.task.excluir');
  Route::get('task/up/{id}', 'TaskController@up')->name('site.task.up');
  Route::get('task/down/{id}', 'TaskController@down')->name('site.task.down');
  Route::get('task/progresso/{id}', 'TaskController@progresso')->name('site.task.progresso');
  Route::put('task/progressoupdate', 'TaskController@progressoupdate')->name('site.task.progressoupdate');
});


