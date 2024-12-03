<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataPribadiController;
use App\Http\Controllers\User\UserDataPribadiController;
use App\Http\Controllers\Admin\DataKeluargaController;
use App\Http\Controllers\UpdateInformationProfileController;

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

Route::view('/', 'pages.auth.login')->name('login');
Route::post('auth/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/register', [RegisterController::class, 'store'])->name('user.register.store');

Route::group(['prefix' => 'admin', 'middleware' => ['user.authenticate']], function () {

    Route::view('/', 'pages.admin.dashboard')->name('admin.dashboard'); //Admin Dashboard

    Route::resource('users', DashboardController::class);

    Route::resource('dataPribadi', DataPribadiController::class);

    Route::resource('dataKeluarga', DataKeluargaController::class);

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout'); //Admin Logout

});

Route::group(['prefix' => 'user', 'middleware' => ['user.authenticate']], function () {

    Route::view('/', 'pages.user.dashboard')->name('user.dashboard'); //User Dashboard

    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout'); //User Logout

    Route::get('edit', [UpdateInformationProfileController::class, 'edit'])->name('userprofile.edit');

    Route::put('update', [UpdateInformationProfileController::class, 'update'])->name('userprofile.update');

});
