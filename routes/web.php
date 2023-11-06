<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('listings', ListingController::class)->except(['destroy']);
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
});

Route::group(
    [
        'prefix' => 'realtor',
        'as' => 'realtor.',
        'middleware' => 'auth'
    ],
    function () {
        Route::resource('listings', RealtorListingController::class)->only(['index', 'destroy']);
    }
);

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);
