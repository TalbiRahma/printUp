<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Models\InitialProduct;

class InitialProductController extends Controller
{
    //

    public function index(){
        
        $product = InitialProduct::all();
        $category_product = CategoryProduct::all();
        return view('admin.produits.index')->with('product' , $product)->with('category_product' , $category_product);
    }

    public function ajouterProduit(Request $request){
 
       //dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required',
            

        ]);

        $product = new InitialProduct();
        $product->name = $request->name;
        $product->category_product_id = $request->category_product;
        $product->description = $request->description;
        $product->price = $request->price;
        $sizes = array(
            
            'XS' => $request->input('XS'),
            'S' => $request->input('S'),
            'M' => $request->input('M'),
            'L' => $request->input('L'),

        );

        $product->sizes = json_encode(array_keys($request->only(['XS', 'S', 'M', 'L'])));
        //$product->sizes = json_encode($sizes);

        //upload image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname.= "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath , $newname);

        $product->photo = $newname;
        if ($product->save()){
            return redirect()->back();
        }else{
            echo"error";
        }
        
    }

    public function supprimerProduit($id){

        $product = InitialProduct::find($id);

       $file_path = public_path().'/uploads/'.$product->photo;

        unlink($file_path);
        if ($product->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    public function modifierProduit(Request $request){

        $product = InitialProduct::find($request->id_product);
        $category_product = CategoryProduct::all();
        //dd($product);
        $product->name = $request->name;
        $product->category_product_id = $request->category_product;
        $product->description = $request->description;
        $product->price = $request->price;
        $sizes = array(
            
            'XS' => $request->input('XS'),
            'S' => $request->input('S'),
            'M' => $request->input('M'),
            'L' => $request->input('L'),

        );

        $product->sizes = json_encode(array_keys($request->only(['XS', 'S', 'M', 'L'])));

        //upload image
        if($request->file('photo')){
            //supprimer ancienne photo
            $file_path = public_path().'/uploads/'.$product->photo;
            unlink($file_path);

            //upload nv photo
            $newname = uniqid();
            $image = $request->file('photo');
            $newname.= "." . $image->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $image->move($destinationPath , $newname);
            $product->photo = $newname;

        }
        
        if ($product->update()){
            return redirect()->back();
        }else{
            echo"error";
        }
    }

    public function searchProduct(Request $request){
        //dd($request);
        $category_product = CategoryProduct::all();
        $product = InitialProduct::where('name', 'LIKE' , '%'. $request->product_name .'%')->get();

        return view('admin.produits.index' , compact('product','category_product'));
    }
}
