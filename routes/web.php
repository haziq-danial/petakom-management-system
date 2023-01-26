<?php

use App\Models\Bulletin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageBulletinController;

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

Route::group(['prefix' => 'bulletin', 'as' => 'manage-bulletin.'], function () {
    // Index page complete
    Route::get('/index', [ManageBulletinController::class, 'viewBulletinList'])
        ->name('index');
    // Add bulletin
    Route::get('/add', function () {
        return view('ManageBulletin.Addbulletin');
    })
    ->name('add'); 
    // Add confirmation 
    Route::get('/addconfirming', function () {
        return view('ManageBulletin.ConfirmAddBulletin');
    })
    ->name('addconfirming');   
    // Confirm Add bulletin
    Route::post('/confirmAdd', [ManageBulletinController::class, 'addBulletin'])
        ->name('confirmAdd');
    // Search bulletin complete
    Route::get('/search', [ManageBulletinController::class, 'searchBulletin'])
        ->name('search');
    // View bulletin complete
    Route::get('/view/{bulletin_id}', [ManageBulletinController::class, 'viewBulletinDetails'])
        ->name('view');
    // Edit bulletin complete
    Route::get('/edit/{bulletin_id}', [ManageBulletinController::class, 'editBulletin'])
        ->name('edit');
    // Confirm Edit bulletin complete
    Route::get('/confirmEdit/{bulletin_id}',function ($bulletin_id) {
        $bulletin = Bulletin::find($bulletin_id);
        return view('ManageBulletin.ConfirmEditBulletin', [
            'bulletin' => $bulletin
        ]);
    })
    ->name('confirmEdit');
    // Delete bulletin complete
    Route::get('/delete/{bulletin_id}', [ManageBulletinController::class, 'deleteBulletin'])
        ->name('delete');
    // Update bulletin complete
    Route::post('/update/{bulletin_id}', [ManageBulletinController::class, 'updateBulletin'])
        ->name('update');
});