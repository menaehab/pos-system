<?php

use Livewire\Volt\Volt;
use App\Livewire\HomePage;
use App\Livewire\Auth\Login;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use App\Livewire\Suppliers\SupplierPage;
use App\Livewire\Categories\CategoryPage;



// logout
Route::post('logout', Logout::class)->name('logout');

// login
Route::get('login', Login::class)->name('login');

Route::middleware('auth')->group(function () {

    // home
    Route::get('/', HomePage::class)->name('home');

    // categories
    Route::get('categories', CategoryPage::class)->name('categories');

    // suppliers
    Route::get('suppliers', SupplierPage::class)->name('suppliers');
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