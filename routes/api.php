<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\NewsLetterController;

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

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('subscribers', [SubscribersController::class, 'index']);
Route::post('subscriber-add', [SubscribersController::class, 'store']);
Route::post('newsletter', [NewsLetterController::class, 'store']);
