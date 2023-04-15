<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function index(){
        
        return view('admin.commandes.index');
    }
    public function detail(){
        
        return view('admin.commandes.detail');
    }
}
