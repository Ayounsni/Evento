<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
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
})->middleware(['guest']);

Route::get('/dashboard', [DashboardController::class, 'index'] )->middleware(['auth', 'verified'])
->name('dashboard');

Route::get('/test', [UserController::class, 'test'])->name('test');

Route::middleware('auth','admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::put('/user/{user}', [UserController::class, 'autoriser'])->name('aut');
    Route::put('/users/{user}', [UserController::class, 'ban'])->name('ban');
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::put('/event/{event}', [EventController::class, 'accepter'])->name('accepter');
    Route::put('/events/{event}', [EventController::class, 'rejeter'])->name('rejeter');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories');
    Route::get('/addCategorie', [CategorieController::class, 'create'])->name('addCat');
    Route::post('/addCategorie', [CategorieController::class, 'store'])->name('addCatt');
    Route::get('/editCategorie/{categorie}', [CategorieController::class, 'edit'])->name('editCat');
    Route::put('/editCat/{categorie}', [CategorieController::class, 'update'])->name('editCatt');
    Route::delete('/deleteCat/{categorie}', [CategorieController::class, 'destroy'])->name('deleteCat');
});
Route::middleware('auth','organisateur')->group(function () {
    Route::get('/organisateur', [OrganisateurController::class, 'index'])->name('organisateur');
    Route::get('/validation', [OrganisateurController::class, 'indexx'])->name('validation');
    Route::get('/ajoutEvent', [EventController::class, 'create'])->name('addEvent');
    Route::post('/ajoutEvent', [EventController::class, 'store'])->name('addEvente');
    Route::get('/editEvent/{event}', [EventController::class, 'edit'])->name('editEvent');
    Route::put('/editEvent/{event}', [EventController::class, 'update'])->name('editEventt');
    Route::delete('/deleteEvent/{event}', [EventController::class, 'destroy'])->name('deleteEvent');
    Route::get('/valid/{reservation}', [ReservationController::class, 'accepter'])->name('valid');
    Route::get('/invalid/{reservation}', [ReservationController::class, 'rejeter'])->name('invalid');
    Route::get('/statistique', [OrganisateurController::class, 'statistique'])->name('statistique');
});
Route::middleware('auth','user')->group(function () {
    Route::get('/participant', [EventController::class, 'indexx'])->name('user');
    Route::post('/participant', [EventController::class, 'indexx'])->name('filtre');
    Route::get('/event/{event}', [EventController::class, 'show'])->name('show');
    Route::get('/reservation',[ReservationController::class, 'index'])->name('reservation');
    Route::get('/reserv/{event}',[ReservationController::class, 'reservation'])->name('reserv');
    Route::get('/ticket/{reservation}',[ReservationController::class, 'ticket'])->name('ticket');
    Route::get('/invoice/{reservation}', [InvoiceController::class, 'generate'])->name('invoice');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
