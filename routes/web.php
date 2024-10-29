<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\CustomerGroupController;
use App\Livewire\Report;
use App\Livewire\Transaksi;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('Dashboard.index');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('Inventory.index');

    Route::get('/customer-groups', [CustomerGroupController::class, 'index'])->name('CustomerGroup.index');
    Route::post('/customer-groups', [CustomerGroupController::class, 'store'])->name('CustomerGroup.store');
    Route::get('/customer-groups/edit/{customer_group}', [CustomerGroupController::class, 'edit'])->name('CustomerGroup.edit');
    Route::put('/customer-groups/{customer_group}', [CustomerGroupController::class, 'update'])->name('CustomerGroup.update');
    Route::delete('/customer-groups/{customer_group}', [CustomerGroupController::class, 'delete'])->name('CustomerGroup.destroy');

    Route::get('/customers', [CustomerController::class, 'index'])->name('Customer.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('Customer.store');
    Route::get('/customers/edit/{customer}', [CustomerController::class, 'edit'])->name('Customer.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('Customer.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'delete'])->name('Customer.destroy');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('Supplier.index');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('Supplier.store');
    Route::get('/suppliers/edit/{supplier}', [SupplierController::class, 'edit'])->name('Supplier.edit');
    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('Supplier.update');
    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'delete'])->name('Supplier.destroy');

    Route::get('/brands', [BrandController::class, 'index'])->name('Brand.index');
    Route::post('/brands', [BrandController::class, 'store'])->name('Brand.store');
    Route::get('/brands/edit/{brand}', [BrandController::class, 'edit'])->name('Brand.edit');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('Brand.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'delete'])->name('Brand.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('Category.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('Category.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('Category.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('Category.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('Category.destroy');

    Route::get('/groups', [GroupController::class, 'index'])->name('Group.index');
    Route::post('/groups', [GroupController::class, 'store'])->name('Group.store');
    Route::get('/groups/edit/{group}', [GroupController::class, 'edit'])->name('Group.edit');
    Route::put('/groups/{group}', [GroupController::class, 'update'])->name('Group.update');
    Route::delete('/groups/{group}', [GroupController::class, 'delete'])->name('Group.destroy');

    Route::get('/units', [UnitController::class, 'index'])->name('Unit.index');
    Route::post('/units', [UnitController::class, 'store'])->name('Unit.store');
    Route::get('/units/edit/{unit}', [UnitController::class, 'edit'])->name('Unit.edit');
    Route::put('/units/{unit}', [UnitController::class, 'update'])->name('Unit.update');
    Route::delete('/units/{unit}', [UnitController::class, 'delete'])->name('Unit.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('Product.index');
    Route::post('/products', [ProductController::class, 'store'])->name('Product.store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('Product.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('Product.update');
    Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('Product.destroy');

    Route::get('/purchases', Report::class)->name('transaksi.index');
    Route::get('/purchases-form', Transaksi::class)->name('transaksi.baru');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Register
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'storeRegister'])->name('store.register');
// Login
Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('store.login');
