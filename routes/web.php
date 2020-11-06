<?php

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

Auth::routes();

//
//  Front Route
//

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('book.index');
})->name('home');

Route::get('/catalog', 'CatalogController@getAllBooks')->name('catalog.getAllBooks');
Route::get('/book/{id}', 'CatalogController@getSingleBook')->name('catalog.getSingleBook');
Route::post('/order', 'OrderController@buyBook')->name('order.buyBook');

//
//  Admin Route Group
//
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function (){
        return view('admin.index');
    })->name('main');

    Route::resource('books', BookController::class);
    Route::resource('orders', OrderController::class)->only([
        'index', 'show'
    ]);;
});
