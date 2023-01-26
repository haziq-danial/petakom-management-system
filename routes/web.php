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

