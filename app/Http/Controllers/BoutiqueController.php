<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    //
    public function maboutique (){
        return view("client.boutiques.maboutique");
    }

    public function aadToBoutique(Request $request){
        dd($request);
    }
}
