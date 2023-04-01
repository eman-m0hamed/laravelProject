<?php

use App\Http\Controllers\API\JobQuestionController;
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

Route::middleware('auth:sanctum')->get('/user/{id}', function (Request $request) {
    return $request->user();
});

Route::resource('jobQuestions',JobQuestionController::class);

// Route::get('JobQuestions','JobQuestionController@show');

// Route::get('/api/data', 'JobQuestionController@getJobQuestion');
// Route::get('/jobQuestions/{id}', [JobQuestionController::class,'getJobQuestions']);
Route::post('jobQuestions/addJobQuestion',[JobQuestionController::class,'store']);
Route::put('jobQuestions/updateJobQuestion/{id}',[JobQuestionController::class,'update']);
Route::delete('jobQuestions/deleteJobQuestion/{id}',[JobQuestionController::class,'destroy']);
Route::resource('allJobs',JobController::class);
Route::post('user/jobExam',[JobController::class,"addResults"]);

// the final route
