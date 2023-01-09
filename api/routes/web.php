<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['namespace' => 'users', 'prefix' => 'users', 'as' => 'user.'], static function (): void {
    Route::get('/sign-up', [UserController::class, 'returnSignUpPage'])->name('sign-up');
});
