<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::prefix('auth')->group(function () {
    // Route to register a new user
    Route::post('/register', [AuthController::class, 'register']);

    // Route to log in a user
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Routes that require authentication
Route::middleware(['auth:sanctum'])->group(function () {
    // Route to get the authenticated user's information
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route to log out the authenticated user
    Route::post('/logout', [AuthController::class, 'logout']);

    // Routes that require authentication and admin privileges
    Route::middleware(['admin'])->group(function () {
        // Route to generate the purchase report
        Route::get('/purchase-report', [ReportController::class, 'purchaseReport']);
    });
});
