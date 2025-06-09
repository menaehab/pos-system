<?php

use App\Livewire\Home;
use Livewire\Volt\Volt;
use App\Livewire\Auth\Login;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;



// logout
Route::post('logout', Logout::class)->name('logout');

// login
Route::get('login', Login::class)->name('login');

// home
Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');
});







// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });


// require __DIR__.'/auth.php';
