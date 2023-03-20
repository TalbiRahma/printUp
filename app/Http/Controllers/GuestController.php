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

<<<<<<< HEAD

    public function shopProduit(){
        $initial_products = InitialProduct::all();
        $category_product = CategoryProduct::all();

        
        return view('guest.shopproduit')->with('initial_products', $initial_products)->with('category_product', $category_product);
    }
=======
   

    public function shopproduit(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('guest.shopproduit')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);;
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

>>>>>>> ac84db501083d998fa71950da502439faf86ae93
}
