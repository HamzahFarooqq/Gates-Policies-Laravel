<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Admin\TaskController;
// use App\Http\Controllers\User\TaskController;

use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\User\TaskController as UserTaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




route::group([

    'prefix' => 'admin',
    'middleware' => 'is_admin',
    'as'    => 'admin.'

], function() {

        route::get('tasks', [AdminTaskController::class, 'index'])->name('tasks.index');
});




route::group([

    'prefix' => 'user',
    'as'    => 'user.'

], function() {

        route::get('tasks', [UserTaskController::class, 'index'])->name('tasks.index');
});




route::group(['middleware' => 'auth'], function(){
    route::resource('tasks', \App\Http\Controllers\TaskController::class);
});