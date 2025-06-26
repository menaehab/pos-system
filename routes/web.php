<?php

use App\Livewire\HomePage;
use App\Livewire\Auth\Login;
use App\Livewire\Actions\Logout;
use App\Livewire\Roles\RolePage;
use App\Livewire\Sales\SalePage;
use App\Livewire\Sales\SaleShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\ProductPage;
use App\Livewire\Customers\CustomerPage;
use App\Livewire\Customers\CustomerShow;
use App\Livewire\Purchases\PurchasePage;
use App\Livewire\Purchases\PurchaseShow;
use App\Livewire\Suppliers\SupplierPage;
use App\Livewire\Categories\CategoryPage;
use App\Livewire\Purchases\PurchaseCreate;
use App\Livewire\Purchases\PurchaseUpdate;
use App\Http\Controllers\InvoiceController;
use App\Livewire\ActivityLogs\ActivityLogPage;
use App\Livewire\ActivityLogs\ActivityLogShow;
use App\Livewire\SubCategories\SubCategoryPage;
use App\Livewire\InstallmentPayments\InstallmentPaymentPage;

// login
Route::get('login', Login::class)->name('login');

Route::middleware('auth')->group(function () {

    // logout
    Route::post('logout', Logout::class)->name('logout');

    // home
    Route::get('/', HomePage::class)->name('home');

    // manage items
    Route::middleware('can:manage_items')->group(function () {

        // categories
        Route::get('categories', CategoryPage::class)->name('categories');

        // suppliers
        Route::get('suppliers', SupplierPage::class)->name('suppliers');

        // sub categories
        Route::get('sub-categories', SubCategoryPage::class)->name('sub-categories');

        // products
        Route::get('products', ProductPage::class)->name('products');

    });

    // manage purchases
    Route::middleware('can:manage_purchases')->group(function () {

        // purchases
        Route::get('purchases', PurchasePage::class)->name('purchases');

        // purchase create
        Route::get('purchases/create', PurchaseCreate::class)->name('purchases.create');

        // purchase edit
        Route::get('purchases/{id}/edit', PurchaseUpdate::class)->name('purchases.edit');

        // purchase show
        Route::get('purchases/{id}/show', PurchaseShow::class)->name('purchases.show');

    });

    // manage customers
    Route::middleware('can:manage_customers')->group(function () {

        // customers
        Route::get('customers', CustomerPage::class)->name('customers');

        // customer show
        Route::get('customers/{slug}/show', CustomerShow::class)->name('customers.show');

    });

    // installment payments
    Route::middleware('can:pay_installments')->get('installment-payments', InstallmentPaymentPage::class)->name('installment-payments');

    // invoice
    Route::get('invoice/{id}/print', [InvoiceController::class, 'print'])->name('invoice.print');

    // manage sales
    Route::middleware('can:manage_sales')->group(function () {

        // sales
        Route::get('sales', SalePage::class)->name('sales');

        // sale show
        Route::get('sales/{invoice_number}/show', SaleShow::class)->name('sales.show');

    });

    // activity logs
    Route::middleware('can:view_activity_logs')->group(function () {

        // activity logs
        Route::get('activity-logs', ActivityLogPage::class)->name('activity-logs');

        // activity log show
        Route::get('activity-logs/{id}/show', ActivityLogShow::class)->name('activity-logs.show');

    });

    // manage users and roles
    Route::middleware('can:manage_users_roles')->group(function () {

        // users
        // Route::get('users', UserPage::class)->name('users');

        // roles
        Route::get('roles', RolePage::class)->name('roles');
    });

});
