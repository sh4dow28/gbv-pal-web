<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');
    Route::get('/profile', function () {
        return view('pages.users-profile');
    })->name('profile');
    Route::get('/newuser', function () {
        return view('pages.create-user');
    })->name('new-user');
    Route::get('/users', function () {
        return view('pages.user-list');
    })->name('users-list');

    Route::get('/visitorbadges', [BadgeVisiteurController::class, 'index'])->name('visitor-badge-list');

    Route::get('/visitorbadgesrequest', function () {
        return view('pages.request-visitor-badge');
    })->name('visitor-badge-request');

    Route::get('/societies', function () {
        return view('pages.societies-list');
    })->name('societies-list');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
