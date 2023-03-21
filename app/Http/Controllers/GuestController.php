<?php

namespace App\Http\Controllers;

use App\Models\CategoryDesign;
use App\Models\CategoryProduct;
use App\Models\Design;
use Illuminate\Http\Request;
use App\Models\InitialProduct;

class GuestController extends Controller
{
    //

    public function home(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('guest.home')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);
    }

   

    public function shopproduit(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.shopproduit')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);
    }

    public function productDetails($id){
        $product = InitialProduct::find($id);
        $category = $product->categorie_products;
       /* $products = InitialProduct::where($product->categorie_products->name != null)->get();
        dd($products);*/
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.initialProductDetails')->with('designs', $designs)->with('product', $product)->with('category_product', $category_product)->with('category_design', $category_design)
        ;
    }

    public function shopdesign(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.shopdesign')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);;
    }

    public function shoppersonaliser(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.shoppersonaliser')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);;
    }

}
