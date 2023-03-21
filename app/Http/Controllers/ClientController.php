<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    //
    public function cart(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.cart')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);

    }


    public function checkout(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.checkout')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);

    }

    public function whishlist(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.whishlist')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);

    }

    public function account(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.account')->with('designs', $designs)->with('initial_products', $initial_products)->with('category_product', $category_product)->with('category_design', $category_design);

    }

}

