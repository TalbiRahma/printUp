<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function clients()
    {
        $clients = User::where('role', 'user')->get();
        return view('admin.clients.index')->with('clients' , $clients);
    }
}
