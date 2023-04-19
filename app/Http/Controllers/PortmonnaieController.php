<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortmonnaieController extends Controller
{
    //
    public function index(){
        
        return view('admin.paiement.index');
    }

    public function historiquePaiement(){
        
        return view('admin.paiement.historiquepaiement');
    }

    public function portemonnaie(){
        
        return view('client.portemonnaie.index');
    }
}
