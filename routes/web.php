<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportVoterController;
use App\Http\Livewire\DashboardIndex;
use App\Http\Livewire\PermissionIndex;
use App\Http\Livewire\ProviderIndex;
use App\Http\Livewire\RoleIndex;
use App\Http\Livewire\SchoolIndex;
use App\Http\Livewire\UserIndex;
use App\Http\Livewire\VoterIndex;
use App\Http\Livewire\VotingPage;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum'])->group(function () {

    // Route for the getting the data feed
    // Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/voting_page', VotingPage::class)->name('voting')->middleware('can:voting_menu');

    Route::middleware('redirectToVotingPage')->group(function(){
        Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index')->middleware(['can:dashboard_menu']);
        Route::get('/roles', RoleIndex  ::class)->name('roles.index')->middleware('can:roles_menu');
        Route::get('/permissions', PermissionIndex::class)->name('permissions.index')->middleware('can:permissions_menu');
        Route::get('/users', UserIndex::class)->name('users.index')->middleware('can:users_menu');
        Route::get('/schools', SchoolIndex::class)->name('schools.index')->middleware('can:schools_menu');
        Route::get('/providers', ProviderIndex::class)->name('providers.index')->middleware('can:providers_menu');
        Route::get('/voters', VoterIndex::class)->name('voters.index')->middleware('can:voters_menu');

        Route::post('/import_voters', [ImportVoterController::class,'import'])->name('voters.import');
    });

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});