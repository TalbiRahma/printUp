<?php

namespace App\Http\Controllers;

use App\Models\CategoryDesign;
use Illuminate\Http\Request;

class CategoryDesignController extends Controller
{
    //

    public function index(){
        $category_design = CategoryDesign::all();
        return view('admin.categories.designs.index')->with('category_design' , $category_design);
    }

    public function ajouterCategroieDesign(Request $request){
 
       
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        $category_design = new CategoryDesign();
        $category_design->name = $request->name;
        $category_design->description = $request->description;

        //upload image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname.= "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath , $newname);

        $category_design->photo = $newname;
        if ($category_design->save()){
            return redirect()->back();
        }else{
            echo"error";
        }
        
    }

    public function supprimerCategroieDesign($id){

        $category_design = CategoryDesign::find($id);

       $file_path = public_path().'/uploads/'.$category_design->photo;

        unlink($file_path);
        if ($category_design->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    public function modifierCategroieDesign(Request $request){

        $category_design =CategoryDesign::find($request->id_category_design);
        //dd($category_design);
        $category_design->name = $request->name;
        $category_design->description = $request->description;

        //upload image
        if($request->file('photo')){
            //supprimer ancienne photo
            $file_path = public_path().'/uploads/'.$category_design->photo;
            unlink($file_path);

            //upload nv photo
            $newname = uniqid();
            $image = $request->file('photo');
            $newname.= "." . $image->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $image->move($destinationPath , $newname);
            $category_design->photo = $newname;

        }
        
        if ($category_design->update()){
            return redirect()->back();
        }else{
            echo"error";
        }
    }


    public function showDesignsByCategory($category_design_id)
    {
        $category_design = CategoryDesign::findOrFail($category_design_id);
        $designs = $category_design->designs;
        /*dd($category_product->designs);
        $productsArray = $designs->toArray()*/; // Convertir les produits en tableau
        return view('admin.categories.produits.produitcatg')->with('category_design' , $category_design)->with('designs' , $designs);//->with('products' , $productsArray);// Afficher les produits triés par catégorie
    }




    public function designs(){
        return view('admin.categories.designs.designcatg');
    }
}
