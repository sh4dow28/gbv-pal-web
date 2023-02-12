<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BadgeVisiteurController;
use App\Http\Controllers\DemandeBadgeVisiteurController;
use App\Http\Controllers\DemandeProductionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProductionBadgeController;
use App\Http\Controllers\ProductionVignetteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocieteController;
use App\Models\DemandeProduction;
use App\Models\Societe;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Dashboard')->name('home');
});
// Charger la lsite des badges visiteur
Route::get('/vbadges', [BadgeVisiteurController::class, 'index'])->name('vbadge.list');
// Ajouter badge visiteur
Route::get('/vbadge-create',  [BadgeVisiteurController::class, 'create'])->name('vbadge.create');
Route::post('/vbadge-store', [BadgeVisiteurController::class, 'store'])->name('vbadge.store');
// Afficher un badge visiteur
Route::get('/visitor-badge/{$id}', [BadgeVisiteurController::class, 'show'])->name('vbadge.edit');
// Modifier un badge visiteur
Route::patch('/visitor-badge/{$id}', [BadgeVisiteurController::class, 'show'])->name('vbadge.show');
// Supprimer un badge visiteur
Route::get('/delete-visitor-badge/{idVBadge}', [BadgeVisiteurController::class, 'destroy'])->name('vbadge.remove');
// Ajout Demande de badge visiteur
Route::get('/all-visitor-badge-request', [DemandeBadgeVisiteurController::class, 'index'])->name('vbadge.request');
Route::get('/visitor-badge-request', [DemandeBadgeVisiteurController::class, 'create'])->name('vbadge.request.create');
Route::post('/visitor-badge-request', [DemandeBadgeVisiteurController::class, 'store'])->name('vbadge.request.store');
Route::post('/visitor-badge-return', [DemandeBadgeVisiteurController::class, 'end'])->name('vbadge.request.return');

Route::get('/profile', function () {
    return view('pages.users-profile');
})->name('profile');
Route::get('/newuser', function () {
    return view('pages.create-user');
})->name('new-user');
Route::get('/users', function () {
    return view('pages.user-list');
})->name('users-list');

Route::get('/societies', [SocieteController::class, 'index'])->name('societies');
Route::get('/societies/create', [SocieteController::class, 'create'])->name('societe.create');
Route::post('/societies/store', [SocieteController::class, 'store'])->name('societe.store');
Route::get('/societies/view', [SocieteController::class, 'show'])->name('societe.show');

Route::get('employees', [EmployeController::class, 'index'])->name('employees');

Route::get('/badge/create', [ProductionBadgeController::class, 'create'])->name('badge.create');
Route::get('/productions/badges', [ProductionBadgeController::class, 'index'])->name('badge.list');
Route::post('/production-badge/store', [DemandeProductionController::class, 'store'])->name('badge.store');

Route::get('/vignette/create', [ProductionVignetteController::class, 'create'])->name('vignette.create');
Route::get('/productions/vignettes', [ProductionVignetteController::class, 'index'])->name('vignette.list');
Route::post('/production-vignette/store', [DemandeProductionController::class, 'store'])->name('vignette.store');

Route::middleware('auth')->group(function () {
});
