<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user');
Route::get('/users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/users/update/{user}', [App\Http\Controllers\UserController::class, 'update'])
    ->name('user.update');

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');
Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
Route::post('/events/store', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
Route::get('/events/{event}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
Route::get('/events/edit/{event}', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
Route::put('/events/update/{event}', [App\Http\Controllers\EventController::class, 'update'])
    ->name('event.update');
Route::get('/events/subscribe/{event}', [App\Http\Controllers\EventController::class, 'subscribe'])
    ->name('event.subscribe');
Route::get('/events/unsubscribe/{event}', [App\Http\Controllers\EventController::class, 'unsubscribe'])
    ->name('event.unsubscribe');
Route::delete('/events/delete/{event}', [App\Http\Controllers\EventController::class, 'destroy'])
    ->name('event.delete');

Route::get('/ajax/get_events', [App\Http\Controllers\EventController::class, 'getEvents']);

Auth::routes();
