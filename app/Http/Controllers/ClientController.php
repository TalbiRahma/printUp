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

    public function shopproduit(){
        return view('client.shopproduit');
    }
    
    public function index(){
        return view('client.index');
    }
}

