<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\LeadDetailController;
use App\Http\Controllers\Api\LeadFileController;
use App\Http\Controllers\Api\LeadStatController;
use App\Http\Controllers\Api\LeadQuestionController;

Route::get('kokot', [LeadStatController::class, 'show']);
Route::get('/stats/leads', [LeadStatController::class, 'show']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('leads', LeadController::class);
Route::apiResource('leads.details', LeadDetailController::class)->shallow();
Route::apiResource('leads.files', LeadFileController::class)->shallow();
Route::apiResource('leads.questions', LeadQuestionController::class)->shallow();
