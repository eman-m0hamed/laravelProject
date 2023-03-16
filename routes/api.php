<?php

use App\Http\Controllers\API\JobController;
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

// job routes
Route::get('jobs',[JobController::class, 'index']);
Route::get('jobs/{job}',[JobController::class, 'show']);
Route::post('jobs/store',[JobController::class, 'store']);
Route::put('jobs/update/{job}',[JobController::class, 'update']);
Route::delete('jobs/delete/{job}',[JobController::class, 'destroy']);
