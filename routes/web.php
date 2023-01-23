<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PtkActivityController;
use App\Http\Controllers\ActivityApprovalController;
use App\Models\PtkActivityModel;

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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

});

Route::controller(RegistrationController::class)->group(function(){

    Route::post('validate_registration', 'validate_registration')->name('user.validate_registration');

    //Route::post('validate_login', 'validate_login')->name('user.validate_login');

    //Route::get('dashboard', 'dashboard')->name('dashboard');

});

Route::get('/', 'App\http\Controllers\PtkActivityController@index')->name('user');
Route::resource("/PtkActivity", PtkActivityController::class);
Route::resource("/ActivityApproval", ActivityApprovalController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

