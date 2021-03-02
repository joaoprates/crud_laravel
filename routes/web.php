<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\TasksController;
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

Route::get('/login', [LoginController::Class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'authenticate']);

Route::prefix('/tasks')->group(function (){

    Route::get('/', [TasksController::Class, 'list'])->name('list');

    Route::get('add', [TasksController::Class, 'add'])->name('add');
    Route::post('add', [TasksController::Class, 'addAction']);

    Route::get('edit/{id}', [TasksController::Class, 'edit'])->name('edit');
    Route::post('edit/{id}', [TasksController::Class, 'editAction']);

    Route::get('delete/{id}', [TasksController::Class, 'del'])->name('del');

    Route::get('mark/{id}', [TasksController::Class, 'done'])->name('done');
});

Route::prefix('/config')->group(function () {
    Route::get('/', [ConfigController::Class, 'index'])->name('config')->middleware('auth');
    Route::post('/', [ConfigController::Class, 'index']);

    Route::get('info', [ConfigController::Class, 'info'])->name('config');
    Route::get('permissions', [ConfigController::Class, 'permissions'])->name('config');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
