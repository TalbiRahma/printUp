<?php

use App\Mail\MailVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryDesignController;
use App\Http\Controllers\InitialProductController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\FavoriteProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\FavoriteDesignController;
use App\Http\Controllers\ProduitPersonnaliserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

/*********Auth******** */



Auth::routes([
    'verify' =>true
]);


/*Route::get('/send', function(){
    Mail::to('talbirahma73@gmail.com')->send(new MailVerification());
    return response('sending');
});*/


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');


/*********GUEST********** */

Route::get('/', [GuestController::class, 'home'])->name('home');

Route::prefix('geust/shop')->group(function (){
    Route::get('/products', [GuestController::class, 'indexProduits'])->name('products.index');
    Route::get('/products/filter', [GuestController::class, 'filter'])->name('products.filter');
    Route::get('/products/{id}/details', [GuestController::class, 'productDetails'])->name('products.details');
    Route::get('/designs', [GuestController::class, 'shopDesign'])->name('designs.index');
    Route::get('/designs/{id}/details', [GuestController::class, 'designDetails'])->name('designs.details');
    Route::get('/Costumize_products', [GuestController::class, 'shopProduitPersonaliser'])->name('Costumize.products.index');
});




/*************CLIENT******** */
Route::group(['middleware' => ['auth']], function(){
    Route::prefix('client')->group(function () {
            Route::get('/cart', [ClientController::class,'cart'])->name('cart');
            Route::get('/checkout', [ClientController::class,'checkout'])->name('checkout');


        /***************WISHLIST******* */
        Route::prefix('wishlist')->group(function () {
            /***********PRODUCT WISHLIST******** */
            Route::prefix('products')->group(function () {
                Route::get('', [FavoriteProductController::class,'productWishlist'])->name('product.wishlist');
                Route::post('/add', [FavoriteProductController::class,'addToWishlist'])->name('wishlist.add.product');
                Route::get('/delete/{id}', [FavoriteProductController::class,'deleteWishlist'])->name('product.wishlist.delete');
            });
            /***********DESIGN WISHLIST******** */
            Route::prefix('designs')->group(function () {
            Route::get('', [FavoriteDesignController::class,'designWishlist'])->name('design.wishlist');
            Route::post('/add', [FavoriteDesignController::class,'addToWishlist'])->name('wishlist.add.design');
            Route::get('/delete/{id}', [FavoriteDesignController::class,'deleteWishlist'])->name('wishlist.delete.design');
            });
        });
        Route::get('/account', [ClientController::class,'account'])->name('account');
        Route::post('/account/update', [ClientController::class,'updateAccount'])->name('account.update');
        Route::post('/review/store', [ClientController::class, 'addReview'])->name('add.review');
        
        /***********client DESIGN***** */
        Route::prefix('designs')->group(function () {
            Route::get('', [DesignController::class, 'index'])->name('designs');
            Route::post('/add', [DesignController::class, 'ajouterDesign'])->name('add.design');
            Route::get('/{id}/delete', [DesignController::class, 'supprimerDesign'])->name('delete.design');
            Route::post('/update', [InitialProductController::class, 'modifierProduit'])->name('edit.product');
            Route::post('/search', [InitialProductController::class, 'searchProduct'])->name('search.product');
        });

        Route::get('/personaliser', [ClientController::class, 'personaliser'])->name('personaliser');
        Route::get('/personnaliser-produit/{id}', [ProduitPersonnaliserController::class, 'sendToPersonnaliser'])->name('personnaliser-produit');
    });
});









/*************ADMIN******** */
Route::group(['middleware' => ['auth','admin']], function(){
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profil/edit', [AdminController::class, 'modifProfil'])->name('modifier.profil');
        Route::post('/profil/update', [AdminController::class, 'updatetProfil'])->name('update.profil');
        Route::get('/profil/donnes',  [AdminController::class, 'donnesProfil'])->name('donnes.profil');


        /************admin CLIENT****** */
        Route::prefix('user')->group(function () {
            Route::get('', [AdminController::class, 'clients'])->name('users');
            Route::get('/user/{id}/bloquer', [AdminController::class, 'bloquerUser'])->name('user.bloquer');
            Route::get('/user/{id}/activer', [AdminController::class, 'activerUser'])->name('user.activer');
        });


        /***********admin CATEGORY***** */
        Route::prefix('categories')->group(function () {
            /***********PRODUCT*********** */
            Route::get('/produits', [CategoryProductController::class, 'index'])->name('category_product');
            Route::get('/{category_id}/produits/all', [CategoryProductController::class, 'showProduitsByCategory'])->name('product.all');

            /***********DESIGN*********** */
            Route::get('/designs', [CategoryDesignController::class, 'index'])->name('category_design');
            Route::get('/{category_design_id}/designs/all', [CategoryDesignController::class, 'showDesignsByCategory'])->name('design.all');
        });


        /********category Product****** */
        Route::prefix('category_product')->group(function () {
            Route::post('/store', [CategoryProductController::class, 'ajouterCategroieProduit'])->name('add.category_product');
            Route::get('/{id}/delete', [CategoryProductController::class, 'supprimerCategroieProduit'])->name('delete.category_product');
            Route::post('/update', [CategoryProductController::class, 'modifierCategroieProduit'])->name('edit.category_product');
            Route::post('/search', [CategoryProductController::class, 'searchCategory'])->name('search.category.product');
        });


        /**********category Design********* */
        Route::prefix('category_design')->group(function () {
            Route::post('/store', [CategoryDesignController::class, 'ajouterCategroieDesign'])->name('add.category_design');
            Route::get('/{id}/delete', [CategoryDesignController::class, 'supprimerCategroieDesign'])->name('delete.category_design');
            Route::post('/update', [CategoryDesignController::class, 'modifierCategroieDesign'])->name('edit.category_design');
            Route::post('/search', [CategoryDesignController::class, 'searchCategory'])->name('search.category.design');
        });


        /***********admin PRODUCT***** */
        Route::prefix('products')->group(function () {
            Route::get('', [InitialProductController::class, 'index'])->name('products');
            Route::post('/store', [InitialProductController::class, 'ajouterProduit'])->name('add.product');
            Route::get('/{id}/delete', [InitialProductController::class, 'supprimerProduit'])->name('delete.product');
            Route::post('/update', [InitialProductController::class, 'modifierProduit'])->name('edit.product');
            Route::post('/search', [InitialProductController::class, 'searchProduct'])->name('search.product');
        });
    });
});






Route::get('admin/commandes', 'App\Http\Controllers\Controller@commandes');
Route::get('admin/paiement', 'App\Http\Controllers\Controller@paiement');
