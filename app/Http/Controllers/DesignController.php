<?php

namespace App\Http\Controllers;

use App\Models\CategoryDesign;
use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    //
    public function index(){
        
        $user = auth()->user(); 
        $design =  Design::where('user_id', $user->id)->latest()->paginate(3);
        $category_design = CategoryDesign::all();
        return view('client.designs.index')->with('design' , $design)->with('category_design' , $category_design);
    }


    public function ajouterDesign(Request  $request){
 
        //dd($request);
         $request->validate([
             'name' => 'required',
             'description' => 'required',
             'price' => 'required',
             'photo' => 'required',
         ]);
 
         $design = new Design();
         $design->name = $request->name;
         $design->category_design_id = $request->category_design;
         $design->description = $request->description;
         $design->price = $request->price;
         $design->user_id = $request->user_id;
         
         //upload image
         $newname = uniqid();
         $image = $request->file('photo');
         $newname.= "." . $image->getClientOriginalExtension();
         $destinationPath = 'uploads';
         $image->move($destinationPath , $newname);
 
         $design->photo = $newname;
         if ($design->save()){
             return redirect()->back()->with('design', $design);
         }else{
             echo"error";
         }
         
     }
     public function supprimerDesign($id){

        $design = Design::find($id);

       $file_path = public_path().'/uploads/'.$design->photo;

        unlink($file_path);
        if ($design->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    
}
