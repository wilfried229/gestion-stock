<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitsController;
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








// ADMIN
Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::prefix('produits')->group(function () {

        Route::get('/','App\Http\Controllers\ProduitsController@index')->name('produit.index');
        Route::get('/create','App\Http\Controllers\ProduitsController@create')->name('produit.create');
        Route::post('/store','App\Http\Controllers\ProduitsController@store')->name('produit.store');
        Route::get('/show/{produits}','App\Http\Controllers\ProduitsController@show')->name('produit.show');
        Route::get('/edit/{produits}','App\Http\Controllers\ProduitsController@edit')->name('produit.edit');
        Route::put('/update/{produits}','App\Http\Controllers\ProduitsController@update')->name('produit.update');

    });

    Route::prefix('commandes')->group(function () {

        Route::get('/','App\Http\Controllers\CommandesController@index')->name('commande.index');
        Route::get('/create','App\Http\Controllers\CommandesController@create')->name('commande.create');
        Route::post('/store','App\Http\Controllers\CommandesController@store')->name('commande.store');
        Route::get('/show/{commandes}','App\Http\Controllers\CommandesController@show')->name('commande.show');
        Route::get('/edit/{commandes}','App\Http\Controllers\CommandesController@edit')->name('commande.edit');
        Route::put('/update/{commandes}','App\Http\Controllers\CommandesController@update')->name('commande.update');

    });




Route::prefix('payements')->group(function () {
    Route::get('/','App\Http\Controllers\PayementsController@index')->name('payement.index');
    Route::get('/create','App\Http\Controllers\PayementsController@create')->name('payement.create');
    Route::post('/store','App\Http\Controllers\PayementsController@store')->name('payement.store');
    Route::get('/show/{payements}','App\Http\Controllers\PayementsController@show')->name('payement.show');
    Route::get('/edit/{payements}','App\Http\Controllers\PayementsController@edit')->name('payement.edit');
    Route::put('/update/{payements}','App\Http\Controllers\PayementsController@update')->name('payement.update');

});






Route::prefix('catgeories')->group(function () {

    Route::get('/','App\Http\Controllers\CategoriesController@index')->name('categorie.index');
    Route::get('/create','App\Http\Controllers\CategoriesController@create')->name('categorie.create');
    Route::post('/store','App\Http\Controllers\CategoriesController@store')->name('categorie.store');
    Route::get('/show/{categories}','App\Http\Controllers\CategoriesController@show')->name('categorie.show');
    Route::get('/edit/{categories}','App\Http\Controllers\CategoriesController@edit')->name('categorie.edit');
    Route::put('/update/{categories}','App\Http\Controllers\CategoriesController@update')->name('categorie.update');


});



    Route::group(['prefix' => "", "middleware" => "isAdmin"], function(){
        // USERS
        Route::prefix('users')->group(function () {
            Route::get('list-abonnes','App\Http\Controllers\Admin\UsersController@listAbonnes')->name('users.listAbonnes');
            Route::get('index','App\Http\Controllers\Admin\UsersController@index')->name('users.index');
            Route::get('create','App\Http\Controllers\Admin\UsersController@create')->name('users.create');
            Route::post('store','App\Http\Controllers\Admin\UsersController@store')->name('users.store');
            Route::get('edit/{id}','App\Http\Controllers\Admin\UsersController@edit')->name('users.edit');
            Route::put('update/{id}','App\Http\Controllers\Admin\UsersController@update')->name('users.update');
            Route::delete('delete/{id}','App\Http\Controllers\Admin\UsersController@destroy')->name('users.destroy');

        });
    });



    // PROFILE
    Route::prefix('profile')->group(function () {

        Route::get('index','App\Http\Controllers\ProfileController@index')->name('profile.index');
        Route::get('edit','App\Http\Controllers\ProfileController@edit')->name('profile.edit');
        Route::post('update','App\Http\Controllers\ProfileController@update')->name('profile.update');
    });



});







Auth::routes();


