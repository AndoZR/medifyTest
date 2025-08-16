<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriItemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master-items', [App\Http\Controllers\MasterItemsController::class, 'index'])->name('master-items.index');
Route::get('/master-items/search', [App\Http\Controllers\MasterItemsController::class, 'search']);
Route::get('/master-items/form/{method}/{id?}', [App\Http\Controllers\MasterItemsController::class, 'formView']);
Route::post('/master-items/form/{method}/{id?}', [App\Http\Controllers\MasterItemsController::class, 'formSubmit']);

Route::get('/master-items/view/{kode}', [App\Http\Controllers\MasterItemsController::class, 'singleView']);
Route::get('/master-items/delete/{id}', [App\Http\Controllers\MasterItemsController::class, 'delete']);


Route::get('/master-items/update-random-data', [App\Http\Controllers\MasterItemsController::class, 'updateRandomData']);

// Daftar Kategori Item
Route::get('kategori-items', [KategoriItemController::class, 'index'])->name('kategori-items.index');
// Form Tambah Kategori Item
Route::get('kategori-items/create', [KategoriItemController::class, 'create'])->name('kategori-items.create');
// Simpan Kategori Item baru
Route::post('kategori-items', [KategoriItemController::class, 'store'])->name('kategori-items.store');// Detail Kategori Item
Route::get('kategori-items/{id}', [KategoriItemController::class, 'show'])->name('kategori-items.show');// Form Edit Kategori Item
Route::get('kategori-items/{id}/edit', [KategoriItemController::class, 'edit'])->name('kategori-items.edit');
// Update Kategori Item
Route::put('kategori-items/{id}', [KategoriItemController::class, 'update'])->name('kategori-items.update');
// Hapus Kategori Item
Route::delete('kategori-items/{id}', [KategoriItemController::class, 'destroy'])->name('kategori-items.destroy');