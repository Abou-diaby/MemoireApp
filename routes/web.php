<?php

use App\Http\Controllers\DemandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'home')->name('app_home');
    Route::get('/about', 'about')->name('app_about');
    Route::match(['get', 'post'], '/dashboard', 'dashboard')->middleware('auth')->name('app_dashboard');

});

Route::controller(LoginController::class)->group(function(){
    Route::get('/logout', 'logout')->name('app_logout');
    Route::post('/exist_email', 'existEmail')->name('app_exist_email');
    Route::match(['get', 'post'], '/activation_code/{token}', 'activationCode')->name('app_activation_code');
    Route::get('/user_checher', 'userChecker')->name('app_user_checher');
    Route::get('/resend_activation_code/{token}', 'resendActivationCode')->name('app_resend_activation_code');
    Route::get('/activation_account_link/{token}', 'activationAccountLink')->name('app_activation_account_link');
    Route::match(['get', 'post'], '/activation_account_change_email/{token}', 'ActivationAccoutChangeEmail')->name('app_activation_account_change_email');
    Route::match(['get', 'post'], '/forgot_password', 'forgotPassword')->name('app_forgotpassword');
    Route::match(['get', 'post'], '/change_password/{token}', 'changePassword')->name('app_changepassword');
});
// Route pour créer une nouvelle demande
Route::get('/demands/new', [DemandController::class, 'create']);

// Route pour afficher une demande spécifique
Route::get('/demands/{id}', [DemandController::class, 'show']);

// Route pour enregistrer une nouvelle demande
Route::post('/demands', [DemandController::class, 'store']);

// Route pour accéder au profil


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Route pour accéder au profil admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

// Route pour Demands
Route::get('home.dashboard', [DemandController::class, 'index'])->middleware('auth')->name('app_dashboard');

Route::put('/demands/{id}', [DemandController::class, 'update']);

Route::delete('/demands/{id}', [DemandController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route pour le login admin et dashboard admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
});
// Route pour accepter , rejeter , voir une demande
Route::post('/admin/dashboard/{id}/accept', [AdminDashboardController::class, 'accept'])->name('admin.dashboard.accept');
Route::post('/admin/dashboard/{id}/reject', [AdminDashboardController::class, 'reject'])->name('admin.dashboard.reject');
Route::get('/admin/demands/{id}', [AdminDashboardController::class, 'show'])->name('admin.show')->middleware('auth:admin');
Route::put('/admin/demand/{id}', [AdminDashboardController::class, 'update'])->name('admin.update');
Route::get('/', [HomeController::class, 'home'])->name('app_home')->middleware('redirect.if.admin');
Route::get('/about', [HomeController::class, 'about'])->name('app_about')->middleware('redirect.if.admin');

