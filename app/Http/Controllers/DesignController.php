<?php

namespace App\Http\Controllers;

use App\Models\CategoryDesign;
use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    //

    

    public function index()
    {

        $user = auth()->user();
        $design =  Design::where('user_id', $user->id)->latest()->paginate(3);
        $category_design = CategoryDesign::all();
        return view('client.designs.index')->with('design', $design)->with('category_design', $category_design);
    }
 

   
    public function supprimerDesign($id)
    {

        $design = Design::find($id);

        $file_path = public_path() . '/uploads/' . $design->photo;

        unlink($file_path);
        if ($design->delete()) {
            return redirect()->back()->with('success1', 'Votre design a été supprimé avec succès !');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function searchDesign(Request $request){
        //dd($request);
        $category_design = CategoryDesign::all();
        $design = Design::where('name', 'LIKE' , '%'. $request->design_name .'%')->get();

        return view('client.designs.index' , compact('design','category_design'));
    }
}
