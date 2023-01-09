<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'users', 'prefix' => 'users', 'as' => 'api.user.'], static function (): void {
    Route::get('/', [UserController::class, 'getPaginateList'])->name('api.user.getList');
    Route::get('/{uid}', [UserController::class, 'get'])->name('api.user.get');
    Route::post('/upload-file', [UserController::class, 'uploadImage'])->name('api.user.upload-image');
    Route::middleware('verified.token')->post('/', [UserController::class, 'store'])->name('store');
});

Route::group(['namespace' => 'positions', 'prefix' => 'positions', 'as' => 'api.position.'], static function (): void {
    Route::get('/', [PositionController::class, 'getList'])->name('api.position.getList');
});

Route::get('/token', [AuthController::class, 'generateToken'])->name('api.token');
