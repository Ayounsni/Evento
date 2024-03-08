<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganisateurController;

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

Route::get('/participant', [UserController::class, 'user'])->name('user');
Route::get('/organisateur', [OrganisateurController::class, 'index'])->name('organisateur');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::put('/user/{user}', [UserController::class, 'autoriser'])->name('aut');
Route::put('/users/{user}', [UserController::class, 'ban'])->name('ban');

Route::get('/ajoutEvent', [EventController::class, 'create'])->name('addEvent');
Route::post('/ajoutEvent', [EventController::class, 'store'])->name('addEvente');
Route::get('/editEvent/{event}', [EventController::class, 'edit'])->name('editEvent');
Route::put('/editEvent/{event}', [EventController::class, 'update'])->name('editEventt');
Route::delete('/deleteEvent/{event}', [EventController::class, 'destroy'])->name('deleteEvent');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::put('/event/{event}', [EventController::class, 'accepter'])->name('accepter');
Route::put('/events/{event}', [EventController::class, 'rejeter'])->name('rejeter');

Route::get('/categories', [CategorieController::class, 'index'])->name('categories');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [DashboardController::class, 'index'] )->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
