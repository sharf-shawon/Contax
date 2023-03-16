<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PublicProfileController;
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
    return view('welcome');
});

Route::get('/p/{cid}', [PublicProfileController::class, 'index'])->name('public.profile.index');
Route::get('/p/{cid}/download', [PublicProfileController::class, 'download'])->name('public.profile.download');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('card/register', [\App\Http\Controllers\CardController::class, 'registerForm'])->name('card.register');
    Route::post('card/register', [\App\Http\Controllers\CardController::class, 'register'])->name('card.register.save');
    Route::resource('card', \App\Http\Controllers\CardController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
});

require __DIR__.'/auth.php';
