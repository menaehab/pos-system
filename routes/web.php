<?php

use App\Livewire\HomePage;
use App\Livewire\Auth\Login;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\ProductPage;
use App\Livewire\Customers\CustomerPage;
use App\Livewire\Purchases\PurchasePage;
use App\Livewire\Purchases\PurchaseShow;
use App\Livewire\Suppliers\SupplierPage;
use App\Livewire\Categories\CategoryPage;
use App\Livewire\Purchases\PurchaseCreate;
use App\Livewire\Purchases\PurchaseUpdate;
use App\Http\Controllers\InvoiceController;
use App\Livewire\SubCategories\SubCategoryPage;

// login
Route::get('login', Login::class)->name('login');

Route::middleware('auth')->group(function () {

    // logout
    Route::post('logout', Logout::class)->name('logout');

    // home
    Route::get('/', HomePage::class)->name('home');

    // categories
    Route::get('categories', CategoryPage::class)->name('categories');

    // suppliers
    Route::get('suppliers', SupplierPage::class)->name('suppliers');

    // sub categories
    Route::get('sub-categories', SubCategoryPage::class)->name('sub-categories');

    // products
    Route::get('products', ProductPage::class)->name('products');

    // purchases
    Route::get('purchases', PurchasePage::class)->name('purchases');

    // purchase create
    Route::get('purchases/create', PurchaseCreate::class)->name('purchases.create');

    // purchase edit
    Route::get('purchases/{id}/edit', PurchaseUpdate::class)->name('purchases.edit');

    // purchase show
    Route::get('purchases/{id}/show', PurchaseShow::class)->name('purchases.show');

    // customers
    Route::get('customers', CustomerPage::class)->name('customers');

    // invoice
    Route::get('invoice/{id}/print', [InvoiceController::class, 'print'])->name('invoice.print');
});