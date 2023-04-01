<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//                   Users
Route::get('/users', [UserController::class, 'index']);
Route::post('/showUser/{user}', [UserController::class, 'show']);
Route::delete('deletedUser/{user}', [UserController::class, 'destroy']);
Route::post('/storeUser', [UserController::class, 'store']);
Route::put('/updateUser/{user}', [UserController::class, 'update']);
Route::post('searchJob', [UserController::class, 'searchJob']);

//                    Admin

Route::get('/candidatesCount', [AdminController::class, 'candidateCount']);
Route::get('/jobCount', [AdminController::class, 'jobCount']);
