<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'create'])
    ->name('login')->middleware('alreadyLoggedIn');
Route::get('login', [AuthController::class, 'create'])
    ->name('login')->middleware('alreadyLoggedIn');
Route::post('login', [AuthController::class, 'store'])
    ->name('log');
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register')->middleware('alreadyLoggedIn');

Route::post('register', [RegisteredUserController::class, 'store']);

Route::post('logout', [AuthController::class, 'destroy'])
    ->name('logout');
