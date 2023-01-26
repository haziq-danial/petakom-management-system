<?php

use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::group(['prefix' => 'manage-report', 'as' => 'manage-report.'], function (){
    Route::get('/', [ReportController::class, 'index'])->name('index');

    Route::get('/create', [ReportController::class, 'create'])->name('create');
    Route::post('/store', [ReportController::class, 'store'])->name('store');

    Route::get('/edit/{ReportID}', [ReportController::class, 'edit'])->name('edit');
    Route::post('/update/{ReportID}', [ReportController::class, 'update'])->name('update');

    Route::get('/view/{ReportID}', [ReportController::class, 'view'])->name('view');

    Route::get('/hosd-approval/{ReportID}', [ReportController::class, 'hosdApproval'])->name('hosd-aproval');
    Route::get('/coordinator-approval/{ReportID}', [ReportController::class, 'coordinatorApproval'])->name('coordinator-approval');
    Route::get('/dean-approval/{ReportID}', [ReportController::class, 'deanApproval'])->name('dean-approval');

    Route::get('/hosd-reject/{ReportID}', [ReportController::class, 'hosdReject'])->name('hosd-reject');
    Route::get('/coordinator-reject/{ReportID}', [ReportController::class, 'coordinatorReject'])->name('coordinator-reject');
    Route::get('/dean-reject/{ReportID}', [ReportController::class, 'deanReject'])->name('dean-reject');
});

Route::group(['prefix' => 'manage-proposal', 'as' => 'manage-proposal.'], function (){
    Route::get('/', [ProposalController::class, 'index'])->name('index');

    Route::get('/create', [ProposalController::class, 'create'])->name('create');
    Route::post('/store', [ProposalController::class, 'store'])->name('store');

    Route::get('/edit/{ProposalID}', [ProposalController::class, 'edit'])->name('edit');
    Route::post('/update/{ProposalID}', [ProposalController::class, 'update'])->name('update');

    Route::get('/view/{ProposalID}', [ProposalController::class, 'view'])->name('view');

    Route::get('/hosd-approval/{ProposalID}', [ProposalController::class, 'hosdApproval'])->name('hosd-aproval');
    Route::get('/coordinator-approval/{ProposalID}', [ProposalController::class, 'coordinatorApproval'])->name('coordinator-approval');
    Route::get('/dean-approval/{ProposalID}', [ProposalController::class, 'deanApproval'])->name('dean-approval');

    Route::get('/hosd-reject/{ProposalID}', [ProposalController::class, 'hosdReject'])->name('hosd-reject');
    Route::get('/coordinator-reject/{ProposalID}', [ProposalController::class, 'coordinatorReject'])->name('coordinator-reject');
    Route::get('/dean-reject/{ProposalID}', [ProposalController::class, 'deanReject'])->name('dean-reject');
});

