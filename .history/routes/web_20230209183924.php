<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BadgeVisiteurController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'Dashboard')->name('home');
        Route::get('/admin/create-categories', 'CreateCategories')->name('admin.createcategories');
        Route::get('/admin/all-categories', 'AllCategories')->name('admin.allcategories');
    });
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
    // Ajout Demande de badge visiteur
    Route::post('/visitor-badge-request', [DemandeBadgeVisiteurController::class, 'store'])->name('vbadge.request');

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
});

require __DIR__ . '/auth.php';
