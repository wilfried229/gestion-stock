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

Route::get('/','ProduitsController@index')->name('produit.index');
Route::get('/create','ProduitsController@create')->name('produit.create');
Route::post('/store','ProduitsController@store')->name('produit.store');
Route::get('/show/{produits}','ProduitsController@show')->name('produit.show');
Route::get('/edit/{produits}','ProduitsController@edit')->name('produit.edit');
Route::put('/update/{produits}','ProduitsController@update')->name('produit.update');






Route::get('/', function () {
    return view('admin.home');
});
