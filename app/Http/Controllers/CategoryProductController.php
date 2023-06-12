<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //

    public function index(){
        $category_product = CategoryProduct::latest()->paginate(10);
        return view('admin.categories.produits.index')->with('category_product' , $category_product);
    }

    public function ajouterCategroieProduit(Request $request){
 
        
        $request->validate([
            'name' => 'required|unique:category_products',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,gif,svg,png|max:2048',
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
            
            return redirect()->back()->with('success1', 'Catégorie ajouté avec succès ');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
        
    }

    public function supprimerCategroieProduit($id){

        
        $category_product = CategoryProduct::find($id);

       $file_path = public_path().'/uploads/'.$category_product->photo;

        unlink($file_path);
        if ($category_product->delete()){
            return redirect()->back()->with('warning1', 'Catégorie supprimé avec succès ');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function modifierCategroieProduit(Request $request){

        $category_product =CategoryProduct::find($request->id_category_product);
        //dd($category_product);
        $category_product->name = $request->name;
        $category_product->description = $request->description;

        //upload image
        if($request->file('photo')){
            //supprimer ancienne photo
            $file_path = public_path().'/uploads/'.$category_product->photo;
            unlink($file_path);

            //upload nv photo
            $newname = uniqid();
            $image = $request->file('photo');
            $newname.= "." . $image->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $image->move($destinationPath , $newname);
            $category_product->photo = $newname;

        }
        
        if ($category_product->update()){
            return redirect()->back()->with('primary1', 'Catégorie modifié avec succès ');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }


    public function showProduitsByCategory($category_id)
    {
        $category_product = CategoryProduct::findOrFail($category_id);
        $initial_products = $category_product->initial_products;
        /*dd($category_product->initial_products);
        $productsArray = $initial_products->toArray()*/; // Convertir les produits en tableau
        return view('admin.categories.produits.produitcatg')->with('category_product' , $category_product)->with('initial_products' , $initial_products);//->with('products' , $productsArray);// Afficher les produits triés par catégorie
    }


    public function searchCategory(Request $request){
        //dd($request);
        //$category_products = CategoryProduct::all();
        $category_product = CategoryProduct::where('name', 'LIKE' , '%'. $request->category_name .'%')->get();

        return view('admin.categories.produits.index' , compact('category_product'));
    }
}
