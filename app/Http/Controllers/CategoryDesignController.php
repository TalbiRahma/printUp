<?php

namespace App\Http\Controllers;

use App\Models\CategoryDesign;
use Illuminate\Http\Request;

class CategoryDesignController extends Controller
{
    // 
    public function index(){
        $category_design = CategoryDesign::latest()->paginate(10);
        return view('admin.categories.designs.index')->with('category_design' , $category_design);
    }

    public function ajouterCategroieDesign(Request $request){
 
       
        $request->validate([
            'name' => 'required|unique:category_designs',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            return redirect()->back()->with('warning1', 'Catégorie ajouté avec succès ');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
        
    }

    public function supprimerCategroieDesign($id){

        $category_design = CategoryDesign::find($id);

       $file_path = public_path().'/uploads/'.$category_design->photo;

        unlink($file_path);
        if ($category_design->delete()){
            return redirect()->back()->with('success1', 'Catégorie supprimé avec succès ');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
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
            return redirect()->back()->with('primary1', 'Catégorie modifié avec succès ');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }


    public function showDesignsByCategory($category_design_id)
    {
        $category_design = CategoryDesign::findOrFail($category_design_id);
        $designs = $category_design->designs;
        //dd($category_design->designs);
       /* $productsArray = $designs->toArray()*/; // Convertir les produits en tableau
        return view('admin.categories.designs.designcatg')->with('category_design' , $category_design)->with('designs' , $designs);//->with('products' , $productsArray);// Afficher les produits triés par catégorie
    }


    public function searchCategory(Request $request){
        
        $category_design = CategoryDesign::where('name', 'LIKE' , '%'. $request->category_name .'%')->get();

        return view('admin.categories.designs.index' , compact('category_design'));
    }


}
