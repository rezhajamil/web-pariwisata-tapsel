<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DestinationImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('destination')->resource('/destination', HomeController::class);
Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('login/callback', ([UserController::class, 'login_callback']))->name('login_callback');

Route::middleware('auth')->group(
    function () {
        Route::prefix('admin')->name('admin.')->middleware('ensureRole:admin')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('destination', DestinationController::class);
            Route::resource('destination_image', DestinationImageController::class);
            Route::put('destination_image/change_cover/{dest_id}', [DestinationImageController::class, 'changeCover'])->name('destination_image.changeCover');
            Route::post('destination_image/delete_image', [DestinationImageController::class, 'deleteImage'])->name('destination_image.deleteImage');
            Route::resource('dashboard', DashboardController::class);
            Route::resource('user', UserController::class);
        });
    }
);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
