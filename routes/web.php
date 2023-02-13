<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingsController;
use App\Models\Listing;

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

Route::get('/', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/create', [ListingsController::class, 'create'])->name('listings.create');
Route::get('/listings/{listing}', [ListingsController::class, 'show'])->name('listings.show');
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit'])->name('listings.edit');
Route::put('/listings/{listing}', [ListingsController::class, 'update'])->name('listings.update');
Route::post('/', [ListingsController::class, 'store'])->name('listings.store');





