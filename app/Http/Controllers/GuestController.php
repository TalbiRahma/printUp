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

        return view('guest.shopproduit')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);;
    }

}
