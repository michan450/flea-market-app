<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyPageController;


//
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
////|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider and all of them will
//| be assigned to the "web" middleware group. Make something great!
//|
//*/

Route::get('/', [ProductController::class, 'index'])->name('top');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::put('/mypage/profile', [ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');

Route::get('/mypage/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit')
    ->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/items', [ItemController::class, 'index']);
Route::post('/items/{item}/like', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('items.like');
    
    
Route::get('/', [ItemController::class, 'index'])->name('items.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/purchase/{item}', [PurchaseController::class, 'show'])->name('purchase.show');
Route::post('/purchase/{item}', [PurchaseController::class, 'store'])->name('purchase.store');
Route::post('/items/{item}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/purchase/address/{item}', [PurchaseController::class, 'editAddress'])
    ->name('purchase.address.edit');

Route::post('/purchase/address/{item}', [PurchaseController::class, 'updateAddress'])
    ->name('purchase.address.update');

Route::post('/purchase/{item_id}', [PurchaseController::class, 'store'])
    ->name('purchase.store')
    ->middleware('auth');

Route::get('/mypage', [MyPageController::class, 'index'])
    ->name('mypage')
    ->middleware('auth');
    
Route::get('/sell', [ItemController::class, 'create'])->name('items.sell');
Route::post('/sell', [ItemController::class, 'store'])->name('items.store');