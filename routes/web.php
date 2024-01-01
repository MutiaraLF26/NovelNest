<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/reading/{id}', [UserController::class, 'readNovel'])->name('readNovel');
    Route::get('/write', [UserController::class, 'writeNovel'])->name('writeNovel');
    Route::post('/write/store', [UserController::class, 'writeNovelStore'])->name('writeNovelStore');
    Route::get('/write/list', [UserController::class, 'listWriteNovel'])->name('listWriteNovel');
    Route::get('/write/edit/{id}', [UserController::class, 'listWriteEdit'])->name('listWriteEdit');
    Route::put('/write/update/{id}', [UserController::class, 'updateWriteEdit'])->name('updateWriteEdit');
    Route::get('/mybook', [UserController::class, 'mybookIndex'])->name('mybookIndex');
    Route::get('/kategori/{categorySlug}', [UserController::class, 'kategoriIndexSlug'])->name('kategoriIndexSlug');
    Route::get('/kategori', [UserController::class, 'listKategori'])->name('listKategori');
    Route::post('/like-novel/{novelId}', [UserController::class, 'likeNovel'])->name('likeNovel');
    Route::get('/riwayat', [UserController::class, 'showReadingHistory'])->name('showReadingHistory');
    Route::post('/live-search', [UserController::class, 'liveSearch'])->name('liveSearch');
    Route::get('/favorite', [UserController::class, 'novelApiGoogle'])->name('novelApiGoogle');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/logout-admin', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');
    Route::get('/admin/users', [AdminController::class, 'userIndex'])->name('userIndex');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::get('/admin/users/create', [AdminController::class, 'userCreate'])->name('userCreate');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/admin/ketegori', [AdminController::class, 'kategoriIndex'])->name('kategoriIndex');
    Route::get('/admin/ketegori/edit/{id}', [AdminController::class, 'kategoriEdit'])->name('kategoriEdit');
    Route::put('/admin/ketegori/update/{id}', [AdminController::class, 'updateKategori'])->name('updateKategori');
    Route::get('/admin/ketegori/create', [AdminController::class, 'kategoriCreate'])->name('kategoriCreate');
    Route::post('/admin/ketegori/store', [AdminController::class, 'storeKategori'])->name('storeKategori');
    Route::delete('/admin/ketegori/delete/{id}', [AdminController::class, 'deleteKategori'])->name('deleteKategori');
    Route::get('/admin/novel', [AdminController::class, 'novelIndex'])->name('novelIndex');
    Route::get('/admin/novel/edit/{id}', [AdminController::class, 'novelEdit'])->name('novelEdit');
    Route::get('/admin/novel/create', [AdminController::class, 'novelCreate'])->name('novelCreate');
    Route::put('/admin/novel/update/{id}', [AdminController::class, 'updateNovel'])->name('updateNovel');
    Route::get('/admin/novel/pdf', [AdminController::class, 'novelIndexPdf'])->name('novelIndexPdf');
    Route::delete('/admin/novel/delete/{id}', [AdminController::class, 'deleteNovel'])->name('deleteNovel');
    // Route::post('/admin/novel/store', 'AdminController@novelStore')->name('novelStore');
});

Route::controller(AdminController::class,)->group(function() {
    Route::post('/admin/users/store', 'storeUser')->name('storeUser');
    Route::post('/admin/novel/store', 'novelStore')->name('novelStore');
});
Route::controller(UserController::class,)->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('/');
    // Route::post('/admin/users/store', 'storeUser')->name('storeUser');
    // Route::post('/admin/novel/store', 'novelStore')->name('novelStore');
});

