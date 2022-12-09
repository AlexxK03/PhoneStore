<?php

use App\Http\Controllers\Admin\PhoneController as AdminPhoneController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\User\PhoneController as UserPhoneController;
use App\Http\Controllers\User\BrandController as UserBrandController;
use App\Http\Controllers\User\StoreController as UserStoreController;
use App\Models\Phone;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


require __DIR__ . '/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/brands', [App\Http\Controllers\HomeController::class, 'brandindex'])->name('home.brands.index');
Route::get('/home/stores', [App\Http\Controllers\HomeController::class, 'storeindex'])->name('home.stores.index');


Route::resource('/admin/phones', AdminPhoneController::class)->middleware(['auth'])->names('admin.phones');

Route::resource('/user/phones', UserPhoneController::class)->middleware(['auth'])->names('user.phones')->only(['index', 'show']);

Route::resource('/admin/brands', AdminBrandController::class)->middleware(['auth'])->names('admin.brands');

Route::resource('/user/brands', UserBrandController::class)->middleware(['auth'])->names('user.brands')->only(['index', 'show']);;

Route::resource('/admin/stores', AdminStoreController::class)->middleware(['auth'])->names('admin.stores');

// Route::resource('/user/stores', UserStoreController::class)->middleware(['auth'])->names('user.stores');
