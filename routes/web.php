<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LpdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransportasiController;

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

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'check');
        Route::get('register', 'register');
        Route::post('register', 'store');
    });
});

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(SppdController::class)->group(function () {
        Route::get('sppd', 'index');
        Route::get('sppd/{id}/edit', 'edit');
        Route::get('sppd/create', 'create');
        Route::post('sppd/create', 'store');
        Route::put('sppd/{id}', 'update');
        Route::delete('sppd/{id}', 'destroy');
        Route::get('/print-sppd', 'printsppd');
        Route::get('/print-spt', 'printspt');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(PrintController::class)->group(function () {
        Route::get('/print-sppd/{id}', 'printsppd');
        Route::get('/print-spt/{id}', 'printspt');
        Route::post('/print-lpd/{id}', 'printlpd');
    });
});

Route::resource('pegawai', KaryawanController::class)->middleware('auth');

Route::resource('golongan', GolonganController::class)->middleware('auth');

Route::resource('kota', KotaController::class)->middleware('auth');

Route::resource('admin', AdminController::class)->middleware('auth');

Route::resource('lpd', LpdController::class)->middleware('auth');

Route::resource('transportasi', TransportasiController::class)->middleware('auth');
