<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    

    public function clients(){
        return view('admin.clients');
    }

    public function categories(){
        return view('admin.categories');
    }

    public function commandes(){
        return view('admin.commandes');
    }

    public function paiement(){
        return view('admin.paiement');
    }

    public function produits(){
        return view('admin.produits');
    }
    


}
