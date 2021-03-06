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
    return view('welcome');
});

Route::resource('/todos','TodosController');
Route::post('/todos/{todo}/completed','TodosController@completed')->name('todos.completed');
Route::get('/todos/completed/index','TodosController@completedTodos')->name('todos.completed.index');
