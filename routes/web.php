<?php


use App\Models\Design;
use App\Models\Commande;
use App\Mail\MailVerification;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;

use App\Models\ProduitPersonnaliser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PortmonnaieController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryDesignController;
use App\Http\Controllers\FavoriteDesignController;
use App\Http\Controllers\InitialProductController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\FavoriteProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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
    'verify' => true
]);



Route::get('test', [ProduitPersonnaliserController::class, 'produitPersonnaliser']);
Route::post('produit-personnaliser-2', [ProduitPersonnaliserController::class, 'produitPersonnaliser2'])->name('produit-personnaliser-2');
Route::post('/modifierProduitInitial', [ProduitPersonnaliserController::class, 'modifierProduitInitial'])->name('modifier_produit_initial');
Route::post('/modifierDesignFavori', [ProduitPersonnaliserController::class, 'modifierDesignFavori'])->name('modifier_design_favori');






Route::post('/upload', function () {
});

/*Route::get('/send', function(){
    Mail::to('talbirahma73@gmail.com')->send(new² MailVerification());
    return response('sending');
});*/


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/personnalise/test', [AdminController::class, 'test']);


/*********GUEST********** */

Route::get('/', [GuestController::class, 'home'])->name('home');

Route::prefix('geust/shop')->group(function () {
    Route::get('/products', [GuestController::class, 'indexProduits'])->name('products.index');
    Route::post('/products/filter', [GuestController::class, 'filter'])->name('products.filter');
    Route::get('/products/{id}/details', [GuestController::class, 'productDetails'])->name('products.details');
    Route::get('/designs', [GuestController::class, 'shopDesign'])->name('designs.index');
    Route::get('/designs/{id}/details', [GuestController::class, 'designDetails'])->name('designs.details');
    Route::get('/Costumize_products', [GuestController::class, 'shopProduitPersonaliser'])->name('Costumize.products.index');
});


 
/*************CLIENT******** */
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('client')->group(function () {
        Route::get('/cart', [ClientController::class, 'cart'])->name('cart');
        Route::get('/checkout', [ClientController::class, 'checkout'])->name('checkout');
        Route::get('/account', [ClientController::class, 'account'])->name('account');
        Route::post('/account/update', [ClientController::class, 'updateAccount'])->name('account.update');
        Route::get('/compte/update', [ClientController::class, 'update'])->name('compte.update');
        Route::post('/review/store', [ClientController::class, 'addReview'])->name('add.review');
        Route::get('/contact', [ClientController::class, 'contact'])->name('contact');
        Route::post('/contact/send', [ClientController::class, 'contactSend'])->name('contact.send');
        
        Route::get('/maboutique', [BoutiqueController::class, 'maboutique'])->name('maboutique');
        Route::post('/add/toboutique', [BoutiqueController::class, 'aadToBoutique'])->name('addto.boutique');

        Route::get('/porte-monnaie', [PortmonnaieController::class, 'portemonnaie'])->name('porte-monnaie');
        Route::post('/porte-monnaie/ajout', [PortmonnaieController::class, 'ajouterCarte'])->name('porte-monnaie.ajout');
        Route::post('/porte-monnaie/modif', [PortmonnaieController::class, 'modifierCarte'])->name('porte-monnaie.modif');
        Route::post('/porte-monnaie/demande', [PortmonnaieController::class, 'demanderArgent'])->name('porte-monnaie.demande');

        



        /***************WISHLIST******* */
        Route::prefix('wishlist')->group(function () {
            /***********PRODUCT WISHLIST******** */
            Route::prefix('products')->group(function () {
                Route::get('', [FavoriteProductController::class, 'productWishlist'])->name('product.wishlist');
                Route::post('/add', [FavoriteProductController::class, 'addToWishlist'])->name('wishlist.add.product');
                Route::get('/delete/{id}', [FavoriteProductController::class, 'deleteWishlist'])->name('product.wishlist.delete');
            });
            /***********DESIGN WISHLIST******** */
            Route::prefix('designs')->group(function () {
                Route::get('', [FavoriteDesignController::class, 'designWishlist'])->name('design.wishlist');
                Route::post('/add', [FavoriteDesignController::class, 'addToWishlist'])->name('wishlist.add.design');
                Route::get('/delete/{id}', [FavoriteDesignController::class, 'deleteWishlist'])->name('wishlist.delete.design');
            });
        });


        /***********client DESIGN***** */
        Route::prefix('designs')->group(function () {
            Route::get('', [DesignController::class, 'index'])->name('designs');
            Route::post('/add', [DesignController::class, 'ajouterDesign'])->name('ajouter.design');
            Route::get('/{id}/delete', [DesignController::class, 'supprimerDesign'])->name('delete.design');
            Route::post('/search', [DesignController::class, 'searchDesign'])->name('search.design');
        });

        /****PERSONNALISER****** */
        Route::prefix('personnaliser')->group(function () 
        {
            Route::get('/produit/{id}', [ProduitPersonnaliserController::class, 'sendToPersonnaliser'])->name('personnaliser.produit');
            Route::post('/modifier_design', [ProduitPersonnaliserController::class, 'addDesign'])->name('modifier.design');
            Route::post('/upload', [ProduitPersonnaliserController::class, 'uploadDesign'])->name('upload.design');
            Route::post('/create_custom_product/save', [ProduitPersonnaliserController::class, 'sauvegarder'])->name('save_custom_product');
            Route::get('', [ProduitPersonnaliserController::class, 'index'])->name('produit.personnaliser');
            Route::post('/addToCart', [ProduitPersonnaliserController::class, 'addToCart'])->name('produit.addToCart');
            Route::post('/search', [ProduitPersonnaliserController::class, 'search'])->name('search.');
            //Route::post('/create_custom_product', [ProduitPersonnaliserController::class, 'createCustomProduct'])->name('create_custom_product');
            
        });


        /*****COMMANDE *****/
        Route::prefix('commande')->group(function () 
        {
            Route::post('/store', [CommandeController::class, 'addCommande'])->name('command.add');
            Route::get('/lc/{idlc}/destroy', [CommandeController::class, 'ligneCommandeDestroy'])->name('command.delete');
            Route::post('/update', [CommandeController::class, 'updateLigne'])->name('commande.update');
            Route::post('/envoi', [CommandeController::class, 'validerCommandes'])->name('commande.envoi');
            Route::post('/list', [CommandeController::class, 'listCommande'])->name('commande.list');
            Route::get('/historique', [CommandeController::class, 'historiqueCommande'])->name('commande.historique');
            Route::get('{id}/historique/details', [CommandeController::class, 'detailCommande'])->name('commande.historique.details');
        });
    });
});









/*************ADMIN******** */
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profil/edit', [AdminController::class, 'modifProfil'])->name('modifier.profil');
        Route::post('/profil/update', [AdminController::class, 'updatetProfil'])->name('update.profil');
        Route::get('/profil/donnes',  [AdminController::class, 'donnesProfil'])->name('donnes.profil');
        Route::get('/profil/boutique',  [AdminController::class, 'maBoutique'])->name('ma.boutique');
        Route::get('/profil/designs',  [AdminController::class, 'mesDesigns'])->name('mes.designs');


        /************admin CLIENT****** */
        Route::prefix('user')->group(function () {
            Route::get('', [AdminController::class, 'clients'])->name('users');
            Route::get('/{id}/bloquer', [AdminController::class, 'bloquerUser'])->name('user.bloquer');
            Route::get('/{id}/activer', [AdminController::class, 'activerUser'])->name('user.activer');
            Route::post('/filtrer', [AdminController::class, 'filtrerUser'])->name('filtrer.members');
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

        /**********admin DESIGN****** */
        Route::prefix('designs')->group(function () {
            Route::get('/', [AdminController::class, 'designs'])->name('verif.designs');
            Route::get('/validee', [AdminController::class, 'designsvalidee'])->name('validee');
            Route::get('/{id}/valider', [AdminController::class, 'validerDesign'])->name('valider.designs');
            Route::get('/{id}/delete', [AdminController::class, 'AdminSupprimerDesign'])->name('admin.delete.design');
            
        });


        /********admin COMMANDES****** */
        Route::prefix('commandes')->group(function () {
            Route::get('/', [AdminController::class, 'commandes'])->name('commandes');
            Route::post('/validée', [AdminController::class, 'validerCommande'])->name('valider.commande');
            Route::get('/validée/list', [AdminController::class, 'listCommandesValide'])->name('commandes.validee');
            /*Route::get('/validée/list/{id}/payer', [AdminController::class, 'marquerCommandePayer'])->name('commande.payer');*/
            Route::get('/validée/list/{id}/payer', function ($id) {
                $commande = Commande::findOrFail($id);

                if ($commande->paiement === 'payee') {
                    return redirect()->back()->with('warning1', 'Cette commande a déjà été payée.');
                } else {
                    app(AdminController::class)->marquerCommandePayer($id);
                    return redirect()->route('commandes.validee')->with('success1', 'La commande a été marquée comme payée.');
                }
            })->name('commande.payer');
            Route::get('/validée/list/{id}/detail', [AdminController::class, 'commandeDetail'])->name('commandes.detail');
            Route::post('/filtrer-commandes', [AdminController::class, 'filtrerCommandes'])->name('filtrer.commandes');
            Route::get('/telecharger-image/{id}',[AdminController::class, 'telechargerImage'])->name('telecharger.image');
        });

        
        Route::prefix('paiement')->group(function () {
            Route::get('/', [AdminController::class, 'listePaiement'])->name('paiement');
            Route::get('member/{id}/historique', [AdminController::class, 'historiquePaiement'])->name('paiement.historique');
            Route::post('/payer', [AdminController::class, 'payer'])->name('transaction.payer');
            Route::get('/historiques', [AdminController::class, 'historiques'])->name('historiques');
        });
    });
});