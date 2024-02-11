<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DomPdfController;
use FontLib\Table\Type\name;

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

// Rute utama, mengarahkan pengguna ke halaman selamat datang
Route::get('/', function () {
    return view('welcome');
});

// Rute otentikasi yang dihasilkan otomatis oleh Laravel
Auth::routes();

// Rute yang hanya dapat diakses oleh admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('admin.dashboard');

// Rute yang hanya dapat diakses oleh petugas
Route::get('/petugas/dashboard', [PetugasController::class, 'dashboard'])
    ->middleware(['auth', 'is.petugas']) // Hanya petugas yang dapat mengakses
    ->name('petugas.dashboard');

// Rute untuk halaman utama pengguna
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'is.user']) // Hanya pengguna yang dapat mengakses
    ->name('home');

// Rute-rute CRUD untuk admin
Route::get('/admin/view', [CrudController::class, 'view'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('view');

Route::get('/admin/create', [CrudController::class, 'create'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('create');

Route::get('/admin/edit/{id}', [CrudController::class, 'edit'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('edit');

Route::post('insert', [CrudController::class, 'store'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('tambah');

Route::put('/update/{id}', [CrudController::class, 'update'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('update');

Route::get('/delete/{id}', [CrudController::class, 'destroy'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('delete');

Route::get('/admin/print/{id}', [DomPdfController::class, 'generatePDF'])
    ->middleware(['auth', 'is.admin']) // Hanya admin yang dapat mengakses
    ->name('print');

// Rute-rute untuk petugas
Route::get('/petugas/create_user', [PetugasController::class, 'create'])
    ->middleware(['auth', 'is.petugas']) // Hanya petugas yang dapat mengakses
    ->name('petugas.create');

Route::post('/petugas/dashboard', [PetugasController::class, 'store'])
    ->middleware(['auth', 'is.petugas']) // Hanya petugas yang dapat mengakses
    ->name('petugas.store');

Route::get('/petugas/view_user', [PetugasController::class, 'showRoles'])
    ->middleware(['auth', 'is.petugas']) // Hanya petugas yang dapat mengakses
    ->name('petugas.view');
