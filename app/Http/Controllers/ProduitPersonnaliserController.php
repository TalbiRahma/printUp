<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;

class ProduitPersonnaliserController extends Controller
{
    //

    public function sendToPersonnaliser($id){
        
        $initial_product = InitialProduct::find($id);
        $design = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('client.personaliser', compact('design', 'initial_product', 'category_product', 'category_design'));
    }

    
    
}
