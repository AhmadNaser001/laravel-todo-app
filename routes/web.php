<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::controller(ThemeController::class)->name('theme.')->group(function(){
    Route::get('/','welcome')->name('welcome');
    Route::get('/home','home')->name('home');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::get('/trashed','trashed')->name('trashed');
});


Route::controller(TaskController::class)->prefix('tasks')->name('task.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::put('/update/{id}', 'update')->name('update');
    Route::put('/complete/{id}','complete')->name('complete');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::post('/{id}/restore', 'restore')->name('restore');
    Route::post('/{id}/force-delete','forceDelete')->name('forceDelete');


});




// Route::get('/home', function () {
//     return view('theme.home');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
