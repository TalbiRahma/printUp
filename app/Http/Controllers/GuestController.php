<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Design;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
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
        if (auth()->check()) {
            $commande = Commande::where('member_id', auth()->user()->id)->where('etat', 'en cours')->first();
            return view('guest.home', compact('designs', 'initial_products', 'category_product', 'category_design', 'commande'));
        }

        $this->clearSessionData($request);
        return view('guest.home', compact('designs', 'initial_products', 'category_product', 'category_design'));
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
        $designs = Design::all();
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
            return view('guest.boutiques', compact('initial_products', 'category_product', 'sizes', 'designs', 'category_design', 'commande'));
        }
        return view('guest.boutiques', compact('designs', 'initial_products', 'category_product', 'category_design', 'boutiques'));
    }

    public function oneBoutique($id)
    {
        $boutique = Boutique::with(['designs' => function ($query) {
            $query->where('visibility', true)->where('etat', 'valide');
        }])->find($id);

        if ($boutique) {
            return view('guest.boutique', compact('boutique'));
        } else {
            return redirect()->back()->with('danger', 'Une erreur s\'est produite !');
        }
    }
}
