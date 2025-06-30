<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\Auth\OtpResendController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\DataPribadiController;
use App\Http\Controllers\Admin\DataKeluargaController;
use App\Http\Controllers\Admin\DataPelayananController;
use App\Http\Controllers\UpdateInformationProfileController;
use App\Http\Controllers\UpdateDataPribadiController;
use App\Http\Controllers\UpdateDataKeluargaController;
use App\Http\Controllers\UpdateDataPelayananController;
use App\Http\Middleware\PreventAdminAccess;
use App\Http\Middleware\PreventUserAccess;

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
Route::get('send-mail', [MailController::class, 'index']);
Route::post('auth/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/register', [RegisterController::class, 'store'])->name('user.register.store');
Route::get('otp/verify', [OtpVerificationController::class, 'showVerifyForm'])->name('otp.verify.form');
Route::post('otp/verify', [OtpVerificationController::class, 'verify'])->name('otp.verify.submit');

Route::get('otp/resend', [OtpResendController::class, 'resend'])->name('otp.resend');

Route::group(['prefix' => 'admin', 'middleware' => ['user.authenticate', 'preventUserAccess']], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', DataUserController::class);

    Route::resource('dataPribadi', DataPribadiController::class);

    Route::resource('dataKeluarga', DataKeluargaController::class);

    Route::resource('dataPelayanan', DataPelayananController::class);

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

});

Route::group(['prefix' => 'user', 'middleware' => ['user.authenticate', 'preventAdminAccess']], function () {

    Route::view('/', 'pages.user.dashboard-new')->name('user.dashboard'); //User Dashboard

    Route::view('/edit', 'pages.user.dashboard-edit')->name('useredit.dashboard'); //User Dashboard


    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout'); //User Logout

    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', [UpdateInformationProfileController::class, 'edit'])->name('userprofile.edit');

        Route::put('update', [UpdateInformationProfileController::class, 'update'])->name('userprofile.update');
    });

    Route::group(['prefix' => 'data-pribadi'], function () {
        Route::get('create', [UpdateDataPribadiController::class, 'create'])->name('userdatapribadi.create');

        Route::post('store', [UpdateDataPribadiController::class, 'store'])->name('userdatapribadi.store');

        Route::get('edit', [UpdateDataPribadiController::class, 'edit'])->name('userdatapribadi.edit');

        Route::put('update', [UpdateDataPribadiController::class, 'update'])->name('userdatapribadi.update');

    });

    Route::group(['prefix' => 'data-keluarga'], function () {
        Route::get('create', [UpdateDataKeluargaController::class, 'create'])->name('userdatakeluarga.create');

        Route::post('store', [UpdateDataKeluargaController::class, 'store'])->name('userdatakeluarga.store');

        Route::get('edit', [UpdateDataKeluargaController::class, 'edit'])->name('userdatakeluarga.edit');

        Route::put('update', [UpdateDataKeluargaController::class, 'update'])->name('userdatakeluarga.update');

    });

    Route::group(['prefix' => 'data-pelayanan'], function () {
        Route::get('create', [UpdateDataPelayananController::class, 'create'])->name('userdatapelayanan.create');

        Route::post('store', [UpdateDataPelayananController::class, 'store'])->name('userdatapelayanan.store');

        Route::get('edit', [UpdateDataPelayananController::class, 'edit'])->name('userdatapelayanan.edit');

        Route::put('update', [UpdateDataPelayananController::class, 'update'])->name('userdatapelayanan.update');

    });
});
