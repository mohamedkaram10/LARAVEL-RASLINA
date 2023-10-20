<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;

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

// Route::get('dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::as('admin.')->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('profile', 'profile')->name('profile.view');
    Route::get('profile/edit/{id}', 'edit_profile')->name('profile.edit');
    Route::post('profile/update', 'update_profile')->name('profile.update');
    Route::post('profile/password-change', 'change_password')->name('profile.change.password');
    Route::get('logout', 'destroy')->name('logout');
});

require __DIR__.'/auth.php';
