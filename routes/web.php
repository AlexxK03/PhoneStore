<?php

use App\Http\Controllers\Admin\PhoneController as AdminPhoneController;
use App\Http\Controllers\User\PhoneController as UserPhoneController;
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

Route::resource('/admin/phones', AdminPhoneController::class)->middleware(['auth'])->names('admin.phones');

Route::resource('/user/phones', UserPhoneController::class)->middleware(['auth'])->names('user.phones')->only(['index', 'show']);
