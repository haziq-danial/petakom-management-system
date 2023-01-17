<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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
    //return view('welcome');
    //return view('auth.registration');
    return view('Auth.login');
});

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('staff-registration', [AuthController::class, 'staff_registration'])->name('staff.register');

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('user-login', [AuthController::class, 'user_login'])->name('user.login');

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('edit', [ProfileController::class, 'edit'])->name('edit');

Route::post('user-edit', [ProfileController::class, 'edit_validation'])->name('user.edit_validation');

Route::get('view', [ProfileController::class, 'view'])->name('view');

Route::get('password', [ProfileController::class, 'password'])->name('password');

Route::post('change-password', [ProfileController::class, 'changePassword'])->name('user.changePassword');

Route::post('user-view', [ProfileController::class, 'view_profile'])->name('user.view_profile');

Route::get('register_member', [ProfileController::class, 'register_member'])->name('register_member');

Route::post('register', [ProfileController::class, 'member_register'])->name('user.member_register');

Route::get('forgot-password', [AuthController::class, 'indexForgotPassword'])->middleware('guest')->name('indexForgotPassword');

Route::post('forgot-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('user.resetPassword');

Route::get('indexResetPassword/{token}', [AuthController::class, 'indexResetPassword'])->middleware('guest')->name('indexResetPassword');

Route::post('reset-password', [AuthController::class,'passwordUpdate'])->middleware('guest')->name('user.passwordUpdate');