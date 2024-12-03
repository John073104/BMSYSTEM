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
    Route::get('/', [ResidentController::class, 'index'])->name('residents.index');
    Route::get('/create', [ResidentController::class, 'create'])->name('residents.create');
    Route::post('/', [ResidentController::class, 'store'])->name('residents.store');
    Route::get('/{id}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::put('/{id}', [ResidentController::class, 'update'])->name('residents.update');
});

Route::get('/admin/report', [AdminController::class, 'report'])->name('admin.report');

use App\Http\Controllers\Admin\BarangayOfficialsController;
use App\Http\Controllers\Admin\ResidentProfilingController;
use App\Http\Controllers\Admin\HealthSanitationController;
use App\Http\Controllers\Admin\ClearancesFormsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DashboardController;


// Admin Routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/barangay-officials', [BarangayOfficialsController::class, 'index'])->name('admin.barangay_officials');
    Route::get('/resident-profiling', [ResidentProfilingController::class, 'index'])->name('admin.resident_profiling');
    Route::get('/health-sanitation', [HealthSanitationController::class, 'index'])->name('admin.health_sanitation');
    Route::get('/clearances-forms', [ClearancesFormsController::class, 'index'])->name('admin.clearances_forms');
    Route::get('/report', [ReportController::class, 'index'])->name('admin.report');
});

Route::prefix('admin/residents')->middleware('auth:admin')->group(function () {
    Route::get('/', [ResidentController::class, 'index'])->name('admin.residents.index'); // List all residents
    Route::get('/create', [ResidentController::class, 'create'])->name('admin.residents.create'); // Show form to create a resident
    Route::post('/', [ResidentController::class, 'store'])->name('admin.residents.store'); // Store new resident
    Route::get('/{id}/edit', [ResidentController::class, 'edit'])->name('admin.residents.edit'); // Show form to edit a resident
    Route::put('/{id}', [ResidentController::class, 'update'])->name('admin.residents.update'); // Update resident
    Route::delete('/{id}', [ResidentController::class, 'destroy'])->name('admin.residents.destroy'); // Delete resident
});
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('/admin/barangay-officials', [AdminController::class, 'barangayOfficials'])->name('admin.barangay_officials');
// Route::get('/admin/resident-profiling', [AdminController::class, 'residentProfiling'])->name('admin.resident_profiling');
// Route::get('/admin/health-sanitation', [AdminController::class, 'healthSanitation'])->name('admin.health_sanitation');
// Route::get('/admin/clearances-forms', [AdminController::class, 'clearancesForms'])->name('admin.clearances_forms');
// Route::get('/admin/report', [AdminController::class, 'report'])->name('admin.report');
// // Admin Routes
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::resource('admin/barangay-officials', BarangayOfficialController::class);
//     Route::resource('admin/residents', ResidentController::class);
//     Route::resource('admin/finance', FinanceController::class);
//     Route::resource('admin/health', HealthController::class);
//     Route::resource('admin/peace-order', PeaceOrderController::class);
//     Route::resource('admin/clearances', ClearanceController::class);
//     Route::resource('admin/communication', CommunicationController::class);
//     Route::resource('admin/special-projects', SpecialProjectController::class);
//     Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');
// });

// // User (Barangay Officials) Routes
// Route::middleware(['auth:user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
//     Route::get('/user/residents', [UserController::class, 'viewResidents'])->name('user.residents');
//     Route::post('/user/report-health', [UserController::class, 'reportHealth'])->name('user.report.health');
//     Route::post('/user/report-order', [UserController::class, 'reportOrder'])->name('user.report.order');
//     Route::post('/user/request-clearance', [UserController::class, 'requestClearance'])->name('user.request.clearance');
//     Route::get('/user/communication', [UserController::class, 'communication'])->name('user.communication');
//     Route::post('/user/report-submission', [UserController::class, 'submitReport'])->name('user.report.submit');
// });