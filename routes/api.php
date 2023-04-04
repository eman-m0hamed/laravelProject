<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\AdminController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('/logout',[RegisterController::class,'logout']);



Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware(['auth:sanctum'])->group(function(){
Route::post('/logout',[RegisterController::class,'logout']);
});
///////////////////////////////////////////////////////////////////////////////
Route::controller(AdminController::class)->group(function(){
    Route::post('admin/register', 'register');
    Route::post('admin/login', 'login');
});
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/admin/logout',[AdminController::class,'logout']);
    });

//Route::post('admin/login',[AdminController::class,'login']);
// Route::group(['middleware'=>['auth:api']],function(){
//     Route::get('/logout', 'Api\AuthController@logout');
// });

// Route::middleware('auth:sanctum')->group( function () {
//     Route::get('user',[UserController::class,'userDetails']);
//     Route::get('logout',[UserController::class,'logout']);
// });
