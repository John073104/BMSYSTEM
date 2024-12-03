<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Home route
Route::get('/', function () {
    return view('welcome'); // Homepage
});

// User Authentication Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Dashboard Route
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/create', [AdminController::class, 'showCreateForm'])->name('admin.create');
Route::post('/admin/create', [AdminController::class, 'create'])->name('admin.create.submit');

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

use App\Http\Controllers\ResidentController;

Route::prefix('admin/residents')->middleware('auth:admin')->group(function () {
    Route::get('/', [ResidentController::class, 'index'])->name('admin.residents.index'); // List all residents
    Route::get('/create', [ResidentController::class, 'create'])->name('admin.residents.create'); // Show form to create a resident
    Route::post('/', [ResidentController::class, 'store'])->name('admin.residents.store'); // Store new resident
    Route::get('/{id}/edit', [ResidentController::class, 'edit'])->name('admin.residents.edit'); // Show form to edit a resident
    Route::put('/{id}', [ResidentController::class, 'update'])->name('admin.residents.update'); // Update resident
    Route::delete('/{id}', [ResidentController::class, 'destroy'])->name('admin.residents.destroy'); // Delete resident
});

use App\Http\Controllers\Admin\BarangayOfficialsController;
use App\Http\Controllers\Admin\ResidentProfilingController;
use App\Http\Controllers\Admin\HealthSanitationController;
use App\Http\Controllers\Admin\ClearancesFormsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DashboardController;

// Admin Routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/barangay-officials', [AdminController::class, 'barangayOfficials'])->name('admin.barangay_officials');
    Route::get('/residents', [AdminController::class, 'residentIndex'])->name('admin.residents.index');
    Route::get('/health-sanitation', [AdminController::class, 'healthSanitation'])->name('admin.health_sanitation');
    Route::get('/clearances-forms', [AdminController::class, 'clearancesForms'])->name('admin.clearances_forms');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.report');
});

// User Routes
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/barangay-officials', [UserController::class, 'barangayOfficials'])->name('user.barangay_officials');
    Route::get('/health-sanitation', [UserController::class, 'healthSanitation'])->name('user.health_sanitation');
    Route::get('/clearances-forms', [UserController::class, 'clearancesForms'])->name('user.clearances_forms');
    Route::get('/community-reports', [UserController::class, 'communityReports'])->name('user.community_reports');
    Route::get('/notifications', [UserController::class, 'notifications'])->name('user.notifications');
});
