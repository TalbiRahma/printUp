<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function dashboard(){
        //return view('client.dashboard');
        return view('home');
    }

    public function shop(){
        return view('client.shop');
    }
    
    public function index(){
        return view('client.index');
    }
}

