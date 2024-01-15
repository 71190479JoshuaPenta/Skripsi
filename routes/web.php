<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\Data_Pasien;

use App\Http\Controllers\DokterController;

use App\Http\Controllers\Data_Obat;

use Laravel\Fortify\Fortify;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth\login');
})->name('login');
Route::get('/login', 'LoginController@showLoginForm')->name('login');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



// Route::get('/register', function () {
//     return view('auth\register');
// })->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register');

Fortify::registerView(function () {
    return view('auth.register'); // Assuming your registration form view is in resources/views/auth/register.blade.php
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/data_pasien', [Data_Pasien::class, 'showDataPasien']);
Route::get('/add_doctor_dokter', [DokterController::class, 'showDoctor']);
Route::get('/data_obat', [Data_Obat::class, 'showObat']);
Route::get('/homeadmin', [AdminController::class, 'showHome']);
// Route::post('/upload_doctor', [AdminController::class, 'uploadDoctor']);
// Route::post('/add-doctor', [AdminController::class, 'store'])->name('add-doctor');
Route::get('/show_doctor', [DokterController::class, 'showDoctor']);
Route::post('/upload_doctor', [DokterController::class, 'addDoctor'])->name('add-doctor');



Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->name('home');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view',[AdminController::class,'addview']);
