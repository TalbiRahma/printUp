<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //

    public function account(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.account', compact('designs', 'initial_products', 'category_product', 'category_design'));

    }


    public function updateAccount(Request $request){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        $request->validate([
            'password' =>'confirmed', 
        ], [
            'password.confirmed' => 'Le mot de passe et sa confirmation doivent être identiques.',
        ]);
       // dd($request);
        $user = Auth::user();
        $user->first_name =$request->first_name;
        $user->last_name =$request->last_name;
        $user->email =$request->email;
        $user->cin =$request->cin;
        $user->phone =$request->phone;

        if ($request->password){
            $user->password = Hash::make($request->password);
        }

       //upload image
       if($request->file('photo')){
        if($user->photo){
            //supprimer ancienne photo
            $file_path = public_path().'/uploads/'.$user->photo;
            unlink($file_path);

            //upload nv photo
            $newname = uniqid();
            $image = $request->file('photo');
            $newname.= "." . $image->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $image->move($destinationPath , $newname);
            $user->photo = $newname;
        }else{
            //upload nv photo
            $newname = uniqid();
            $image = $request->file('photo');
            $newname.= "." . $image->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $image->move($destinationPath , $newname);
            $user->photo = $newname;
        }
        
        }

        $user->update();
        return view('client.account', compact('designs', 'initial_products', 'category_product', 'category_design'));

    }

    public function cart(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.cart', compact('designs', 'initial_products', 'category_product', 'category_design'));

    }

    
    
    

    public function checkout(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.checkout', compact('designs', 'initial_products', 'category_product', 'category_design'));

    }

    public function whishlist(){

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        
        return view('client.whishlist', compact('designs', 'initial_products', 'category_product', 'category_design'));

    }

    

}

