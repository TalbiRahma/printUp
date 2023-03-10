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

    public function bloquerUser( $iduser ){

        $client = User::find($iduser);
        $client->is_active = false;
        $client->update();

        return redirect()->back()->with('success' , 'Client bloquee');

    }

    public function activerUser( $iduser ){

        $client = User::find($iduser);
        $client->is_active = true;
        $client->update();

        return redirect()->back()->with('success' , 'Client activee');

    }


    public function Profile(){
        return view('admin.donnesprofil');
    }


    public function editProfile(){
        return view('admin.editprofil');
    }
}
