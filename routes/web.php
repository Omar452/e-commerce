<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Middleware\AdminMiddleware;

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

Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('items.index');
    Route::get('/{items:slug}', [ItemController::class, 'show'])->name('items.show');
});

Route::group(['prefix' => 'items', "middleware" => 'admin'], function() {
    Route::get('/list', [ItemController::class, 'list'])->name('items.list');
    Route::get('/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/', [ItemController::class, 'store'])->name('items.store');
    Route::get('/{items}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::post('/{items}', [ItemController::class, 'update'])->name('items.update');
});

require __DIR__.'/auth.php';
