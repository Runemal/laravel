<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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
Route::get('/', function () {
    return view('home');
});

/*News router*/
Route::get('/news', [NewsController::class, 'index'])
    ->name("news::catalog");
//Route::get('/news', '\App\Http\Controllers\NewsController@index');
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
    Route::get('/update',[AdminNewsController::class, 'update'])
        ->name('update');
    Route::get('/delete',[AdminNewsController::class, 'delete'])
        ->name('delete');
});

/*Other pages*/

Route::get('/auth', function () {
    return view('auth');
});
Route::get('/about', function () {
    return view('about');
});
