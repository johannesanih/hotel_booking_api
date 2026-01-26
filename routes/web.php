<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MigrationRunnerController;
use App\Http\Controllers\TestAuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/run-migrations', [MigrationRunnerController::class, 'run']);
Route::get('/test-register', [TestAuthController::class, 'showForm'])->name('test.register.form');
Route::post('/test-register', [TestAuthController::class, 'register'])->name('test.register.submit');

Route::get('/debug-host', function () {
    return response()->json([
        'host' => request()->getHost(),
        'full_url' => request()->fullUrl(),
        'app_url' => config('app.url'),
    ]);
});