<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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
    Route::get('/view/{item:slug}', [ItemController::class, 'show'])->name('items.show');
    Route::get('/search', [ItemController::class, 'search'])->name('items.search');
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/list', [ItemController::class, 'list'])->name('items.list');
    Route::get('/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/store', [ItemController::class, 'store'])->name('items.store');
    Route::get('/edit/{item}', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/update/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/delete/{item}', [ItemController::class, 'delete'])->name('items.delete');
});

require __DIR__.'/auth.php';
