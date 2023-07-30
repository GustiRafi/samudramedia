<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookImageController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ClientController::class,'index'])->name('index');
Route::get('/books',[ClientController::class,'book'])->name('books');
Route::get('/journals',[ClientController::class,'journal'])->name('journals');
Route::get('book/{slug}',[ClientController::class,'bookDetail'])->name('book');
Route::get('service/{slug}',[ClientController::class,'service'])->name('service');
Route::get('category/{slug}',[ClientController::class,'category'])->name('category');
Route::get('product/{slug}',[ClientController::class,'product'])->name('product');

Route::get('/search',[ClientController::class,'search'])->name('search');

Route::post('/send-mail',[InboxController::class,'send'])->name('send.mail');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categori',CategoriController::class);
        Route::resource('book',BookController::class);
        Route::resource('bookImage',BookImageController::class);
        Route::resource('service',ServiceController::class);
        Route::resource('journal',JournalController::class);
        Route::resource('produk',ProductController::class);

        Route::group(['prefix' => 'paket'], function(){
            Route::get('create/{id}',[PaketController::class,'create'])->name('paket.create');
            Route::get('/{id}',[PaketController::class,'index'])->name('paket.index');
            Route::post('store/{id}',[PaketController::class,'store'])->name('paket.store');
            Route::get('edit/{id}',[PaketController::class,'edit'])->name('paket.edit');
            Route::post('update/{id}',[PaketController::class,'update'])->name('paket.update');
            Route::post('destroy/{id}',[PaketController::class,'destroy'])->name('paket.destroy');
        });

        Route::group(['prefix' => 'detail'], function(){
            Route::get('create/{id}',[DetailServiceController::class,'create'])->name('detail.create');
            Route::get('/{id}',[DetailServiceController::class,'index'])->name('detail.index');
            Route::post('store/{id}',[DetailServiceController::class,'store'])->name('detail.store');
            Route::get('edit/{id}',[DetailServiceController::class,'edit'])->name('detail.edit');
            Route::post('update/{id}',[DetailServiceController::class,'update'])->name('detail.update');
            Route::post('destroy/{id}',[DetailServiceController::class,'destroy'])->name('detail.destroy');
        });

        Route::group(['prefix' => 'email'], function(){
            Route::get('/',[InboxController::class,'index'])->name('email.index');
            Route::post('reply/{id}',[InboxController::class,'reply'])->name('email.reply');
            Route::delete('destroy/{id}',[InboxController::class,'destroy'])->name('email.destroy');
        });

        Route::get('/profile',[AuthController::class, 'profileView'])->name('profile');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('changepassword');
    });
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[AuthController::class, 'loginView'])->name('login.view');
});
