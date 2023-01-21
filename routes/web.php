<?php

use App\Http\Livewire\Pages\BooksPage;
use App\Http\Livewire\Pages\FavouritePage;
use App\Http\Livewire\Pages\HomePage;
use App\Http\Livewire\Pages\LoginPage;
use App\Http\Livewire\Pages\RegisterPage;
use App\Http\Livewire\Pages\UsersPage;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomePage::class)->name('home');
Route::get('logout', [LoginPage::class, 'logout'])->name('logout');
Route::get('login', LoginPage::class)->name('login');
Route::get('register', RegisterPage::class)->name('register');
Route::middleware('auth')->group(function () {
    Route::get('favourites', FavouritePage::class)->name('favourites');
    Route::middleware('admin')->group(function(){
        Route::get('users', UsersPage::class)->name('users');
        Route::get('books', BooksPage::class)->name('books');
    });
});
