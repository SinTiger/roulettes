<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\MainController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BuyerController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

// маршруты для разработки
Route::prefix('dev')->middleware('auth')->group(function () {
    Route::get('/migrate', function () {
        Artisan::call('migrate');
        echo 'Миграция запущена';
    });
});


Route::prefix('main')->controller(MainController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('main.index');
});

Route::prefix('warehouse')->controller(WarehouseController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('warehouse.index');
    Route::get('/create', 'create')->name('warehouse.create');
    Route::post('/', 'store')->name('warehouse.store');
    Route::get('/{warehouse}', 'show')->name('warehouse.show');
    Route::get('/{warehouse}/edit', 'edit')->name('warehouse.edit');
    Route::patch('/{warehouse}', 'update')->name('warehouse.update');
    Route::delete('/{warehouse}', 'destroy')->name('warehouse.destroy');
});

Route::prefix('product')->controller(ProductController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store');
    Route::get('/{product}', 'show')->name('product.show');
    Route::get('/{product}/edit', 'edit')->name('product.edit');
    Route::patch('/{product}', 'update')->name('product.update');
    Route::delete('/{product}', 'destroy')->name('product.destroy');
});

Route::prefix('supplier')->controller(SupplierController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('supplier.index');
    Route::get('/create', 'create')->name('supplier.create');
    Route::post('/', 'store')->name('supplier.store');
    Route::get('/{supplier}', 'show')->name('supplier.show');
    Route::get('/{supplier}/edit', 'edit')->name('supplier.edit');
    Route::patch('/{supplier}', 'update')->name('supplier.update');
    Route::delete('/{supplier}', 'destroy')->name('supplier.destroy');
});

Route::prefix('buyer')->controller(BuyerController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('buyer.index');
    Route::get('/create', 'create')->name('buyer.create');
    Route::post('/', 'store')->name('buyer.store');
    Route::get('/{buyer}', 'show')->name('buyer.show');
    Route::get('/{buyer}/edit', 'edit')->name('buyer.edit');
    Route::patch('/{buyer}', 'update')->name('buyer.update');
    Route::delete('/{buyer}', 'destroy')->name('buyer.destroy');
});


