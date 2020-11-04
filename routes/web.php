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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::prefix('/tarefas')->group(function (){

    Route::get('/', 'TarefasController@list')->name('tarefas.list'); // Listagem de tarefas

    Route::get('add', 'TarefasController@add')->name('tarefas.add'); // Tela de adição
    Route::post('add', 'TarefasController@addAction'); // Ação de adição

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); // Tela de editar
    Route::post('edit/{id}', 'TarefasController@editAction'); // Ação de editar

    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); // Ação de deletar

    Route::get('mark/{id}', 'TarefasController@done')->name('tarefas.done'); // Marcar como resolvido/não
});
