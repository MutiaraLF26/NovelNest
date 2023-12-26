<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;

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
    return view('home');
});
Route::get('/bestSeller', function () {
    return view('feedback');
});
Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/genre', function () {
    return view('dashboard.user.genre.index');
});
Route::get('/mybook', function () {
    return view('dashboard.user.mybook.index');
});
Route::get('/favorite', function () {
    return view('dashboard.user.favorite.index');
});
Route::get('/home', function () {
    return view('dashboard.user.index');
});
Route::get('/login', function () {
    return view('login.index');
});
Route::get('/register', function () {
    return view('register.index');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [BukuController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [BukuController::class, 'show'])->name('users.show');
    Route::get('/users/create', [BukuController::class, 'create'])->name('users.create');
    Route::post('/users', [BukuController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [BukuController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [BukuController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [BukuController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [GenreController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [GenreController::class, 'show'])->name('users.show');
    Route::get('/users/create', [GenreController::class, 'create'])->name('users.create');
    Route::post('/users', [GenreController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [GenreController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [GenreController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [GenreController::class, 'destroy'])->name('users.destroy');
});
require __DIR__.'/auth.php';
