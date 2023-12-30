<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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
})->name('/');
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
})->name('home')->middleware('auth');


Route::middleware(['guest'])->group(function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:user'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin/users', [AdminController::class, 'userIndex'])->name('userIndex');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::get('/admin/users/create', [AdminController::class, 'userCreate'])->name('userCreate');
});

Route::controller(AdminController::class,)->group(function() {
    Route::post('/admin/users/store', 'storeUser')->name('storeUser');
});