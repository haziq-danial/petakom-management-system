<?php

use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['prefix' => 'manage-report', 'as' => 'manage-report.'], function (){
    Route::get('/', [ReportController::class, 'index'])->name('index');

    Route::get('/create', [ReportController::class, 'create'])->name('create');
    Route::post('/store', [ReportController::class, 'store'])->name('store');

    Route::get('/edit/{ReportID}', [ReportController::class, 'edit'])->name('edit');
    Route::post('/update/{ReportID}', [ReportController::class, 'update'])->name('update');

    Route::get('/view/{ReportID}', [ReportController::class, 'view'])->name('view');

    Route::get('/approve/{ReportID}', [ReportController::class, 'approve'])->name('approve');

    Route::get('/reject/{ReportID}', [ReportController::class, 'reject'])->name('reject');
});

Route::group(['prefix' => 'manage-proposal', 'as' => 'manage-proposal.'], function (){
    Route::get('/', [ProposalController::class, 'index'])->name('index');

    Route::get('/create', [ProposalController::class, 'create'])->name('create');
    Route::post('/store', [ProposalController::class, 'store'])->name('store');

    Route::get('/edit/{ProposalID}', [ProposalController::class, 'edit'])->name('edit');
    Route::post('/update/{ProposalID}', [ProposalController::class, 'update'])->name('update');

    Route::get('/view/{ProposalID}', [ProposalController::class, 'view'])->name('view');

    Route::get('/approve/{ProposalID}', [ProposalController::class, 'approve'])->name('approve');

    Route::get('/reject/{ReportID}', [ProposalController::class, 'reject'])->name('reject');
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
