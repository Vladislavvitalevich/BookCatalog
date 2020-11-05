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

Route::get('/home', 'HomeController@index')->name('home');
//
//  Front Route
//
Route::get('/', function () {
    return view('book.index');
});

//
//  Admin Route Group
//
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function (){
        return view('admin.index');
    })->name('main');
});
