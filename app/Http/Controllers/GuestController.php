<?php

namespace App\Http\Controllers;

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

        $initial_products = InitialProduct::latest()->paginate(8);
        $designs = Design::all();
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
            return view('guest.shopproduit', compact('initial_products', 'category_product', 'sizes', 'designs', 'category_design','commande'));
        }

        return view('guest.shopproduit', compact('initial_products', 'category_product', 'sizes', 'designs', 'category_design'));
    }

    public function filter(Request $request)
    {
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

        return view('guest.initialProductDetails')->with('designs', $designs)->with('product', $product)->with('category_product', $category_product)->with('category_design', $category_design)
            ->with('products', $products);
    }






    public function shopdesign()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.shopdesign')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);;
    }

    public function designDetails($id)
    {
        $design = Design::find($id);
        $category = $design->categorie_designs;

        //ba3ed nbadelha par boutique
        $designs = Design::whereHas('categorie_designs', function ($query) use ($category) {
            $query->where('name', $category->name);
        })->where('id', '!=', $id)->get();
        //

        $initial_products = InitialProduct::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.designDetails', compact('initial_products', 'design', 'category_product', 'category_design', 'designs', 'category'));
    }



    public function shoppersonaliser()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.shoppersonaliser')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);;
    }
}
