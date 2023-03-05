<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //

    public function index(){
        $category_product = CategoryProduct::all();
        return view('admin.categories.index')->with('category_product' , $category_product);
    }

    public function ajouterCategroieProduit(Request $request){
 
       
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        $category_product = new CategoryProduct();
        $category_product->name = $request->name;
        $category_product->description = $request->description;

        //upload image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname.= "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath , $newname);

        $category_product->photo = $newname;
        if ($category_product->save()){
            return redirect()->back();
        }else{
            echo"error";
        }
        
    }

    public function supprimerCategroieProduit($id){

        $category_product = CategoryProduct::find($id);

       $file_path = public_path().'/uploads/'.$category_product->photo;

        unlink($file_path);
        if ($category_product->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }
}
