<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortmonnaieController extends Controller
{
    //
    public function index(){
        
        return view('admin.paiement.index');
    }
}
