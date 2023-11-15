<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    return redirect()->route('listings.index');
});

Route::resource('listings', ListingController::class)->only(['index', 'show']);
Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
});

Route::group(['middleware' => ['auth']], function () {
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
    Route::resource('listings.offer', ListingOfferController::class)->only(['store']);
    Route::resource('notifications', NotificationController::class)->only(['index']);
    Route::put('notifications/{notification}/seen', NotificationSeenController::class)->name('notifications.seen');

    // Email verification
    Route::get('/email/verify', function () {
        return inertia('Auth/VerifyEmail');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('listings.index')->with('success', 'Email was verified.');
    })->middleware('signed')->name('verification.verify');
});

Route::group(
    [
        'prefix' => 'realtor',
        'as' => 'realtor.',
        'middleware' => ['auth', 'verified']
    ],
    function () {
        Route::put('listings/{listing}/restore', [RealtorListingController::class, 'restore'])->name('listings.restore')->withTrashed();
        Route::resource('listings', RealtorListingController::class)->withTrashed();
        Route::resource('listings.image', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);
        Route::put('offer/{offer}/accept', RealtorListingAcceptOfferController::class)->name('offer.accept');
    }
);
