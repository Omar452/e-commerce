<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Items routes
Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('items.index');
    Route::get('/view/{item:slug}', [ItemController::class, 'show'])->name('items.show');
    Route::get('/search', [ItemController::class, 'search'])->name('items.search');
});

//Cart routes
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/add/{item}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/subtract/{item}', [CartController::class, 'subtractItem'])->name('cart.subtract');
Route::get('/cart/remove/{item}', [CartController::class, 'removeItem'])->name('cart.remove');

//Checkout routes
Route::middleware('auth')->group(function() {
    Route::get('/checkout/details', [CheckoutController::class, 'details'])->name('checkout.details');
    Route::post('/checkout/check-details', [CheckoutController::class, 'checkDetails'])->name('checkout.check.details');
    Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
});



//Admin routes
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/items/list', [ItemController::class, 'list'])->name('items.list');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/edit/{item}', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/update/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/delete/{item}', [ItemController::class, 'delete'])->name('items.delete');

    Route::get('/categories/list', [CategoryController::class, 'list'])->name('categories.list');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete');
});

require __DIR__.'/auth.php';
