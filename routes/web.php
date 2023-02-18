<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/test123', [App\Http\Controllers\HomeController::class, 'test123']);

Route::post('/create_comanda', [App\Http\Controllers\ComandaController::class, 'store'])->
name('create_comanda');

Route::delete('/delete_comanda/{id}', [App\Http\Controllers\ComandaController::class, 'destroy'])->
name('delete_comanda');

Route::post('/preia_comanda', [App\Http\Controllers\ComandaController::class, 'preia_comanda'])->
name('preia_comanda');

Route::post('/modifica_status_comanda', [App\Http\Controllers\ComandaController::class, 'modifica_status_comanda'])->
name('modifica_status_comanda');

Route::post('/create_role', [App\Http\Controllers\UserRoleController::class, 'create_role'])->
name('create_role');   

Route::put('/update_password/{id}', [App\Http\Controllers\UserRoleController::class, 'update_password'])->
name('update_password'); 

//test

//Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');



//ajax

//Route::get('/ajax', [App\Http\Controllers\HomeController::class, 'test'])->name('ajax');

//Route::get('/ajax2', [App\Http\Controllers\HomeController::class, 'ajax2'])->name('ajax2');
