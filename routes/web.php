<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;





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



Route::get('owner', function () { return view('layouts.owner'); })->name('owner');
Route::get('driver', function () { return view('layouts.driver'); })->name('driver');
Route::get('faq', function () { return view('layouts.faq'); })->name('faq');
Route::get('login', function () { return view('layouts.login'); })->name('admin-login');


Route::post('administrator-login', [UserController::class, 'login'])->name('administrator-login');
Route::get('connexion', [UserController::class, 'loginPage'])->name('login');


Route::get('/', [FaqController::class, 'home'])->name('home');

Route::get('register', [VehicleController::class, 'create'])->name('register');
Route::post('vehicle-store', [VehicleController::class, 'store'])->name('vehicle-store');
Route::get('vehicle-back/{id}', [VehicleController::class, 'back'])->name('vehicle-back');
Route::post('vehicle-update/{id}', [VehicleController::class, 'update' ])->name('vehicle-update');

Route::post('owner-store', [OwnerController::class, 'store'])->name('owner-store');
Route::get('owner-back/{id}', [OwnerController::class, 'back'])->name('owner-back');
Route::post('owner-update/{id}', [OwnerController::class, 'update'])->name('owner-update');

Route::post('driver-store', [DriverController::class, 'store'])->name('driver-store');

Route::post('news-letter-store', [NewsLetterController::class, 'store'])->name('news-letter-store');


Route::middleware(['auth'])->group(function () {
    Route::get('news-letters', [NewsLetterController::class, 'index'])->name('news-letters');
    Route::get('drivers', [DriverController::class, 'index'])->name('drivers-list');

    Route::get('faqs', [FaqController::class, 'index'])->name('faqs');
    Route::get('faqs/{faq}', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::post('faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::get('faqs/delete/{faq}', [FaqController::class, 'destroy'])->name('faqs.delete');
    Route::post('faq-store', [FaqController::class, 'store'])->name('faq-store');


});
