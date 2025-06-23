<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\LeadDetailController;
use App\Http\Controllers\Api\LeadFileController;
use App\Http\Controllers\Api\LeadStatController;
use App\Http\Controllers\Api\LeadQuestionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


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

Route::post('/password/email', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? response()->json(['message' => 'Reset link sent'])
        : response()->json(['message' => 'Unable to send reset link'], 400);
});

Route::post('/password/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? response()->json(['message' => 'Password reset successful'])
        : response()->json(['message' => 'Invalid token or email'], 400);
});