<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryDesignController;
use App\Http\Controllers\InitialProductController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\GuestController;

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

Route::get('/', [GuestController::class, 'home']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



/*************CLIENT******** */
Route::get('client/dashboard', 'App\Http\Controllers\ClientController@dashboard');
Route::get('client/magasin', 'App\Http\Controllers\ClientController@shop');
Route::get('client/index', 'App\Http\Controllers\ClientController@index');





/*************ADMIN******** */
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil/modifier', [AdminController::class, 'modifProfil'])->name('modifier.profil');
    Route::post('/profil/update', [AdminController::class, 'updatetProfil'])->name('update.profil');
    Route::get('/profil/donnes',  [AdminController::class, 'donnesProfil'] )->name('donnes.profil');


        /************admin CLIENT****** */
    Route::prefix('user')->group(function (){
        Route::get('', [AdminController::class, 'clients'])->name('users');
        Route::get('/user/{id}/bloquer', [AdminController::class, 'bloquerUser'])->name('user.bloquer');
        Route::get('/user/{id}/activer', [AdminController::class, 'activerUser'])->name('user.activer');
    });

    
        /***********admin CATEGORY***** */
    Route::prefix('categories')->group(function(){
        /***********PRODUCT*********** */
        Route::get('/produits', [CategoryProductController::class, 'index'])->name('category_product');
        Route::get('/{category_id}/produits/all', [CategoryProductController::class, 'showProduitsByCategory'])->name('product.all');

        /***********DESIGN*********** */
        Route::get('/designs', [CategoryDesignController::class, 'index'])->name('category_design');
        Route::get('/{category_design_id}/designs/all', [CategoryDesignController::class, 'showDesignsByCategory'])->name('design.all');

    });


         /********category Product****** */
    Route::prefix('category_product')->group(function (){
        Route::post('/store', [CategoryProductController::class, 'ajouterCategroieProduit'] )->name('add.category_product');
        Route::get('/{id}/delete', [CategoryProductController::class, 'supprimerCategroieProduit'] )->name('delete.category_product');
        Route::post('/update', [CategoryProductController::class, 'modifierCategroieProduit'] )->name('edit.category_product');
    });


        /**********category Design********* */
    Route::prefix('category_design')->group(function (){
        Route::post('/store', [CategoryDesignController::class, 'ajouterCategroieDesign'] )->name('add.category_design');
        Route::get('/{id}/delete', [CategoryDesignController::class, 'supprimerCategroieDesign'] )->name('delete.category_design');
        Route::post('/update', [CategoryDesignController::class, 'modifierCategroieDesign'] )->name('edit.category_design');
    });


        /***********admin PRODUCT***** */
    Route::prefix('products')->group(function (){
        Route::get('', [InitialProductController::class, 'index'])->name('products');
        Route::post('/store', [InitialProductController::class, 'ajouterProduit'])->name('add.product');
        Route::get('/{id}/delete', [InitialProductController::class, 'supprimerProduit'])->name('delete.product');
        Route::post('/update', [InitialProductController::class, 'modifierProduit'])->name('edit.product');
    });
});














    

    








Route::get('admin/commandes', 'App\Http\Controllers\Controller@commandes');
Route::get('admin/paiement', 'App\Http\Controllers\Controller@paiement');



