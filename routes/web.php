<?php


use App\Models\Bulletin;

use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageBulletinController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PtkActivityController;
use App\Http\Controllers\ActivityApprovalController;
use App\Models\PtkActivityModel;

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\ElectedStudentController;
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

Route::group(['prefix' => 'manage-user', 'as' => 'manage-user.'], function () {

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

Route::group(['prefix' => 'manage-election', 'as' => 'manage-election.'], function () {
    Route::get('/candidates', [CandidateController::class, 'candidates'])->name('candidates');
    Route::get('/register-candidate', [CandidateController::class, 'registerCandidate'])->name('register-candidate');

    Route::get('/list-candidates', [CandidateController::class, 'listCandidates'])->name('list-candidates');
    Route::get('/approve-candidate/{candidate_id}', [CandidateController::class, 'approveCandidate'])->name('approve-candidate');
    Route::get('/reject-candidate/{candidate_id}', [CandidateController::class, 'rejectCandidate'])->name('reject-candidate');

    Route::get('/elections', [ElectionController::class, 'elections'])->name('elections');
    Route::get('/vote/{candidate_id}', [ElectionController::class, 'vote'])->name('vote');

    Route::get('/election/list-votes', [ElectionController::class, 'listVotes'])->name('list-votes');
    Route::get('/election/declare-winner/{candidate_id}', [ElectionController::class, 'declareWinner'])->name('declare-winner');

    Route::get('/list-elected', [ElectedStudentController::class, 'listElected'])->name('list-elected');
    Route::get('/approve-elected/{candidate_id}', [ElectedStudentController::class, 'approve'])->name('approve-elected');
    Route::get('/reject-elected/{candidate_id}', [ElectedStudentController::class, 'reject'])->name('reject-elected');
});


//Route::get('/', 'App\http\Controllers\PtkActivityController@index')->name('user');
Route::resource("/PtkActivity", PtkActivityController::class);
Route::resource("/ActivityApproval", ActivityApprovalController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

