<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\LeadDetailController;
use App\Http\Controllers\Api\LeadFileController;
use App\Http\Controllers\Api\LeadStatController;
use App\Http\Controllers\Api\LeadQuestionController;
use App\Http\Controllers\AuthController;


Route::get('/stats/leads', [LeadStatController::class, 'show']);

Route::post("leads/{lead}/restore", [LeadController::class, 'restore']);
Route::post("leads/details/{detail}/restore", [LeadDetailController::class, 'restore']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('leads', LeadController::class);
Route::apiResource('leads.details', LeadDetailController::class)->shallow();
Route::apiResource('leads.files', LeadFileController::class)->shallow();
Route::apiResource('leads.questions', LeadQuestionController::class)->shallow();

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/users', function () {
        return \App\Models\User::all();
    })->middleware('role:admin');
});

