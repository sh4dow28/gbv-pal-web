<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BadgeVisiteurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandeBadgeVisiteurController;
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

Route::get('/visitorbadgesrequest', function () {
    return view('pages.request-visitor-badge');
})->name('visitor-badge-request');

Route::get('/societies', function () {
    return view('pages.societies-list');
})->name('societies-list');


Route::get('/register', [RegisteredUserController::class, 'store'])->name('registration');

// Charger la lsite des badges visiteur
Route::get('/visitor-badges', [BadgeVisiteurController::class, 'index'])->name('vbadge.list');
// Ajouter badge visiteur
Route::post('/add-visitor-badge', [BadgeVisiteurController::class, 'store'])->name('vbadge.add');
// Afficher un badge visiteur
Route::get('/visitor-badge/{$id}', [BadgeVisiteurController::class, 'show'])->name('vbadge.edit');
// Modifier un badge visiteur
Route::patch('/visitor-badge/{$id}', [BadgeVisiteurController::class, 'show'])->name('vbadge.show');
// Supprimer un badge visiteur
Route::get('/delete-visitor-badge/{idVBadge}', [BadgeVisiteurController::class, 'destroy'])->name('vbadge.remove');

Rout::post('/visitor-badge-request', [DemandeBadgeVisiteurController::class, 'store'])->name('vbadge.request');
