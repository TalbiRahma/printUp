<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function modifProfil(){
        return view('admin.compte.editprofil');
    }

    public function updatetProfil(Request $request){

        $request->validate([
            'password' =>'confirmed' 
        ]);
       // dd($request);
        $user = Auth::user();
        $user->first_name =$request->first_name;
        $user->last_name =$request->last_name;
        $user->email =$request->email;
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
        return view('admin.compte.editprofil');
    }

    public function donnesProfil(){
        return view('admin.compte.donnesprofil');
    }
}
