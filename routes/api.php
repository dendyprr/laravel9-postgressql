<?php

use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\UsersResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// registrasi
Route::post('/register', [UsersController::class, 'register']);

// login
Route::post('/login', [UsersController::class, 'login']);

// get data
Route::get('/users', [UsersController::class, 'index']);

// get data byId
Route::get('/users/{id?}', [UsersController::class, 'show']);

// store
Route::post('/users', [UsersController::class, 'store']);

// update : PUT
Route::put('/users/{id?}', [UsersController::class, 'updatePUT']);

// update : PATCH
Route::patch('/users/{id?}', [UsersController::class, 'updatePATCH']);

// delete data
Route::delete('/users/{id?}', [UsersController::class, 'destroy']);

// delayed data
Route::get('/users', [UsersController::class, 'delayed']);

// api resource
Route::apiResource('/unknown', UsersResourceController::class);


