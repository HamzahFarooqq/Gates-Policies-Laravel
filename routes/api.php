<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




route::post('register/user', [Controller::class, 'register']);


// route::get('show/posts/{post}', [PostController::class, 'show'])->middleware('auth:sanctum');
// route::get('show/posts/{post}/{user}', [PostController::class, 'show']);   // for all users other than authenticated

route::get('edit/posts/{post}', [PostController::class, 'edit'])->middleware('auth:sanctum');



route::apiResource('admins', AdminController::class);
