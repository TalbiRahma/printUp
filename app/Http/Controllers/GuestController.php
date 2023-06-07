<?php

namespace App\Http\Controllers;

use App\Models\Suivi;
use App\Models\Design;
use App\Models\Boutique;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\FavoriteDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    //
    public function clearSessionData(Request $request)
    {
        $request->session()->forget('product_data');
        $request->session()->forget('design_data');
        $request->session()->forget('custom_product_data');
    }
    public function home(Request $request)
    {
        $this->clearSessionData($request);
        $initial_products = InitialProduct::latest()->paginate(8);
        $designs = Design::where('etat', 'valide')->get();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $boutiques = Boutique::all();
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.home', compact('designs', 'initial_products', 'category_product', 'category_design', 'commande', 'boutiques'));
        }

        $this->clearSessionData($request);
        return view('guest.home', compact('designs', 'initial_products', 'category_product', 'category_design', 'boutiques'));

    }



    public function indexProduits()
    {
        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $sizes = ['S', 'M', 'L', 'XL'];
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.shopproduit', compact('initial_products', 'category_product', 'sizes', 'designs', 'category_design', 'commande'));
        }

        return view('guest.shopproduit', compact('initial_products', 'category_product', 'sizes', 'designs', 'category_design'));
    }

    public function filter(Request $request)
    {
        $products = InitialProduct::all();

        if (request()->has('category')) {
            $products = $products->where('category_product_id', request()->input('category'));
            //dd($products);
        }

        if (request()->has('size')) {
            $products = $products->where('sizes', request()->input('size'));
            dd($products);
        }

        if (request()->has('min_price') && request()->has('max_price')) {
            $products = $products->whereBetween('price', [request()->input('min_price'), request()->input('max_price')]);
        }

        return redirect()->back()->with('');
    }




    public function productDetails($id)
    {
        $product = InitialProduct::find($id);
        $category = $product->categorie_products;
        $products = InitialProduct::whereHas('categorie_products', function ($query) use ($category) {
            $query->where('name', $category->name);
        })->where('id', '!=', $id)->get();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.initialProductDetails', compact('designs', 'product', 'category_product', 'category_design', 'products', 'commande'));
        }

        return view('guest.initialProductDetails', compact('designs', 'product', 'category_product', 'category_design', 'products'));
    }






    public function shopdesign()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::where('etat', 'valide')
            ->where('visibility', true)
            ->get();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.shopdesign', compact('designs', 'initial_products', 'category_product', 'category_design', 'commande'));
        }
        return view('guest.shopdesign', compact('designs', 'initial_products', 'category_product', 'category_design'));
    }

    public function designDetails($id)
    {
        $design = Design::find($id);
        $category = $design->categorie_designs;

        //ba3ed nbadelha par boutique
        $designs = Design::whereHas('categorie_designs', function ($query) use ($category) {
            $query->where('name', $category->name);
        })->where('id', '!=', $id)->get();


        $initial_products = InitialProduct::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.designDetails', compact('initial_products', 'design', 'category_product', 'category_design', 'designs', 'category', 'commande'));
        }

        return view('guest.designDetails', compact('initial_products', 'design', 'category_product', 'category_design', 'designs', 'category'));
    }



    public function shoppersonaliser()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.designDetails', compact('initial_products', 'design', 'category_product', 'category_design', 'designs', 'category', 'commande'));
        }
        return view('guest.shoppersonaliser', compact('designs', 'initial_products', 'category_product', 'category_design'));
    }


    public function allBoutique()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $sizes = ['S', 'M', 'L', 'XL'];
        $boutiques = Boutique::all();
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.boutiques', compact('initial_products', 'category_product', 'sizes', 'designs', 'category_design', 'commande', 'boutiques'));
        }
        return view('guest.boutiques', compact('designs', 'initial_products', 'category_product', 'category_design', 'boutiques'));
    }

    public function oneBoutique($id)
    {
        $boutique = Boutique::with(['designs' => function ($query) {
            $query->where('visibility', true)->where('etat', 'valide');
        }])->find($id);

        if (auth()->check() && $boutique) {
            // Récupère la liste des suivis de l'utilisateur
            $list_suivis = Suivi::where('member_id', auth()->user()->id)->get();
            $suivis = [];

            // Récupère les détails des suivis
            foreach ($list_suivis as $item) {
                $suivi = Boutique::find($item->boutique_id);
                if ($suivi) {
                    $suivis[] = $suivi;
                }
            }

            // Récupère la liste des produits favoris de l'utilisateur
            $product_wishlist = FavoriteProduct::where('user_id', auth()->user()->id)->get();
            $initial_products = [];

            // Récupère les détails des produits favoris
            foreach ($product_wishlist as $item) {
                $product = InitialProduct::find($item->initial_product_id);
                if ($product) {
                    $initial_products[] = $product;
                }
            }

            // Récupère la liste des designs favoris de l'utilisateur
            $design_wishlist = FavoriteDesign::where('user_id', auth()->user()->id)->get();
            $designs = [];

            // Récupère les détails des designs favoris
            foreach ($design_wishlist as $item) {
                $design = Design::find($item->design_id);
                if ($design) {
                    $designs[] = $design;
                }
            }

            return view('guest.boutique', compact('boutique', 'suivis', 'initial_products', 'designs'));
        } else {
            if ($boutique) {
                return view('guest.boutique', compact('boutique'));
            } else {
                return redirect()->back()->with('danger', 'Une erreur s\'est produite !');
            }
        }
    }
}
