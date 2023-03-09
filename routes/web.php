<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/*************CLIENT******** */
Route::get('client/dashboard', 'App\Http\Controllers\ClientController@dashboard');





/*************ADMIN******** */
Route::get('admin/dashboard', 'App\Http\Controllers\AdminController@dashboard');

/************admin CLIENT****** */
Route::get('admin/clients', 'App\Http\Controllers\AdminController@clients');
Route::get('user/{id}/bloquer', 'App\Http\Controllers\AdminController@bloquerUser')->name('user.bloquer');
Route::get('user/{id}/activer', 'App\Http\Controllers\AdminController@activerUser')->name('user.activer');


/***********admin CATEGORY***** */
Route::get('admin/categories/produits', 'App\Http\Controllers\CategoryProductController@index');
Route::get('admin/categories/designs', 'App\Http\Controllers\CategoryDesignController@index');
    /**category Product*** */
Route::post('/admin/category_product/store', 'App\Http\Controllers\CategoryProductController@ajouterCategroieProduit');
Route::get('/admin/category_product/{id}/delete', 'App\Http\Controllers\CategoryProductController@supprimerCategroieProduit');
Route::post('/admin/category_product/update', 'App\Http\Controllers\CategoryProductController@modifierCategroieProduit');
    /**category Design*** */
Route::post('/admin/category_design/store', 'App\Http\Controllers\CategoryDesignController@ajouterCategroieDesign');
Route::get('/admin/category_design/{id}/delete', 'App\Http\Controllers\CategoryDesignController@supprimerCategroieDesign');
Route::post('/admin/category_design/update', 'App\Http\Controllers\CategoryDesignController@modifierCategroieDesign');


/***********admin PRODUCT***** */
Route::get('admin/produits', 'App\Http\Controllers\InitialProductController@index');
Route::post('/admin/product/store', 'App\Http\Controllers\InitialProductController@ajouterProduit');
Route::get('/admin/product/{id}/delete', 'App\Http\Controllers\InitialProductController@supprimerProduit');
Route::post('/admin/product/update', 'App\Http\Controllers\InitialProductController@modifierProduit');



Route::get('admin/commandes', 'App\Http\Controllers\Controller@commandes');
Route::get('admin/paiement', 'App\Http\Controllers\Controller@paiement');



