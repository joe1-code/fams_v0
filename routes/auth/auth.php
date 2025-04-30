<?php

use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProfileController::class, 'index'])->name('index');
Route::get('pdf',[EventController::class,'createPdf']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([
    'auth',
    'verified',
    //'office.only'
])->name('dashboard');

Route::get('/home', function () {
    return redirect()->intended('/dashboard');
})->middleware(['auth'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    include 'etms/organizer.php';
    include 'etms/training.php';

});

Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');

include 'etms/events.php';


require __DIR__.'/auth.php';
