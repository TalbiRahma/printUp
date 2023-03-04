<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index(){
        return view('admin.categories.index');
    }


 /*******PRODUCT********** */
    public function ajouterCategroieProduit(Request $request){
 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photp' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->photo = $request->photo;

        $category->save();
        return redirect()->back();
    }
}
