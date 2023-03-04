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
/*************CLIENT******** */
Route::get('client/dashboard', 'App\Http\Controllers\ClientController@dashboard');





/*************ADMIN******** */
Route::get('admin/dashboard', 'App\Http\Controllers\AdminController@dashboard');
Route::get('admin/clients', 'App\Http\Controllers\Controller@clients');



/***********admin CATEGORY***** */
Route::get('admin/categories', 'App\Http\Controllers\CategoryController@index');
    /**caetgory Product*** */
Route::post('/admin/category/store', 'App\Http\Controllers\CategoryController@ajouterCategroieProduit');


Route::get('admin/commandes', 'App\Http\Controllers\Controller@commandes');
Route::get('admin/paiement', 'App\Http\Controllers\Controller@paiement');
Route::get('admin/produits', 'App\Http\Controllers\Controller@produits');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
