<?php

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

/* Index*/

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::get('/', function () {
    return view('home');
});

/*NewsOld router*/
Route::get('/news', [NewsController::class, 'index'])
    ->name("news::catalog");
Route::get('/news/{id}', [NewsController::class, 'category'])
    ->where('id', '[0-9]+')
    ->name('news::category');
Route::get('/news/{id}/{cart}', [NewsController::class, 'cart'])
    ->where('id', '[0-9]+')
    ->where('cart', '[0-9]+')
    ->name('news::category::cart');

/*Admin panel router*/
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
], function () {
    Route::get('/', [AdminNewsController::class, 'index'] )
        ->name('index');
    Route::get('/create',[AdminNewsController::class, 'create'])
        ->name('create');
    Route::get( '/update/{id}',[AdminNewsController::class, 'update'])
        ->where('id', '[0-9]+')
        ->name('update');
    Route::get('/delete/{id}',[AdminNewsController::class, 'delete'])
        ->where('id', '[0-9]+')
        ->name('delete');
    Route::post('/show',[AdminNewsController::class, 'show'])
        ->name('show');
});

/*Other pages*/

//Route::get('/auth', function () {
//    return view('auth');
//});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/db', [\App\Http\Controllers\DBController::class, 'index']);

Route::match(['get', 'post'], '/admin/profile', [ProfileController::class, 'update'])
    ->name('admin:profile')
    ->middleware('auth');

Route::get('/locale/{lang}', [LocaleController::class, 'index'])
    ->where('lang','\w+')
    ->name('locale');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
