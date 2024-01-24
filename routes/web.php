<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
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

// User interface
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/service',[FrontendController::class,'service'])->name('service');
Route::get('/program',[FrontendController::class,'program'])->name('program');
Route::get('/notice',[FrontendController::class,'notice'])->name('notice');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');

// Admin interface
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->prefix('admin')->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
