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
            //'qte' => 'required',
            'size' => 'nullable|string', // Ajoutez cette règle de validation si vous souhaitez autoriser les tailles vides

        ]);

        $product = new InitialProduct();
        $product->name = $request->name;
        $product->category_product_id = $request->category_product;
        $product->description = $request->description;
        $product->price = $request->price;
        //$product->qte = $request->qte;
        //$product->size = $request->size;
        //$product->size = implode(',', $request->size);
        //$product->size = $product->getSizesAttribute($request->size);
        //$product->size = implode(',', $request->size);
        $product->size = $request->size;

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
        //dd($product);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qte = $request->qte;
        $product->size = $request->size;

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
}
