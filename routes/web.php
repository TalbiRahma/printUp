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

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin/dashboard', 'App\Http\Controllers\Controller@dashboard');
Route::get('admin/clients', 'App\Http\Controllers\Controller@clients');
Route::get('admin/categories', 'App\Http\Controllers\Controller@categories');
Route::get('admin/commandes', 'App\Http\Controllers\Controller@commandes');
Route::get('admin/paiement', 'App\Http\Controllers\Controller@paiement');
Route::get('admin/produits', 'App\Http\Controllers\Controller@produits');

