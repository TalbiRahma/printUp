<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;
use Intervention\Image\ImageManagerStatic as Image;

class ProduitPersonnaliserController extends Controller
{
    //

    public function sendToPersonnaliser($id){
        
        $initial_product = InitialProduct::find($id);
        $design = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $user = auth()->user(); 
        $mes_design =  Design::where('user_id', $user->id)->get();
        $favorite_designs = Auth::user()->designs;
        $favorite_products = Auth::user()->initialProducts;
        
        return view('client.personaliser', compact('design', 'initial_product', 'category_product',
                                             'category_design', 'favorite_designs', 'favorite_products', 'mes_design'));
    }

    public function produitPersonnaliser(){
        // create new Intervention Image
        $img = ImageManagerStatic::make('/uploads/T-shirt.jpg');

        // paste another image
        $img->insert('/uploads/design.png');

        // create a new Image instance for inserting
       // $watermark = Image::make('public/design.png');
        //$img->insert($watermark, 'center');

        // insert watermark at bottom-right corner with 10px offset
        //$img->insert('public/watermark.png', 'bottom-right', 10, 10);

        return view('test');
    }
    
    
}
