<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InitialProduct;

class InitialProductController extends Controller
{
    //

    public function index(){
        $product = InitialProduct::all();
        return view('admin.produits.index')->with('product' , $product);
    }

    public function ajouterProduit(Request $request){
 
       
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        $product = new InitialProduct();
        $product->name = $request->name;
        $product->description = $request->description;

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
