<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //
    /*******PRODUCT********** */
    public function ajouterCategroieProduit(Request $request){
 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        $category = new CategoryProduct();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->photo = $request->photo;

        $category->save();
        return redirect()->back();
    }
}
