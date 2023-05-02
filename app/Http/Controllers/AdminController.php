<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Commande;
use App\Events\DeleteDesign;
use Illuminate\Http\Request;
use App\Mail\DesignSupprimer;
use App\Models\LigneCommande;
use App\Models\CategoryDesign;
use Illuminate\Support\Facades\DB;
use App\Models\ProduitPersonnaliser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // 
 
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function clients()
    {
        $clients = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.clients.index')->with('clients', $clients);
    }

    public function bloquerUser($iduser)
    {

        $client = User::find($iduser);
        $client->is_active = false;
        $client->update();

        return redirect()->back()->with('warning1', 'Member bloquee');
    }

    public function activerUser($iduser)
    {

        $client = User::find($iduser);
        $client->is_active = true;
        $client->update();

        return redirect()->back()->with('info1', 'Member activee');
    }

    public function modifProfil()
    {
        return view('admin.compte.editprofil');
    }

    public function maBoutique()
    {
        return view('admin.compte.maboutiques');
    }

    public function mesDesigns()
    {
        $user = auth()->user();
        $design =  Design::where('user_id', $user->id)->latest()->paginate(3);
        $category_design = CategoryDesign::all();
        return view('admin.compte.mesdesigns')->with('design', $design)->with('category_design', $category_design);
    }

    public function updatetProfil(Request $request)
    {

        $request->validate([
            'password' => 'confirmed'
        ]);
        // dd($request);
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        //upload image
        if ($request->file('photo')) {
            if ($user->photo) {
                //supprimer ancienne photo
                $file_path = public_path() . '/uploads/' . $user->photo;
                unlink($file_path);

                //upload nv photo
                $newname = uniqid();
                $image = $request->file('photo');
                $newname .= "." . $image->getClientOriginalExtension();
                $destinationPath = 'uploads';
                $image->move($destinationPath, $newname);
                $user->photo = $newname;
            } else {
                //upload nv photo
                $newname = uniqid();
                $image = $request->file('photo');
                $newname .= "." . $image->getClientOriginalExtension();
                $destinationPath = 'uploads';
                $image->move($destinationPath, $newname);
                $user->photo = $newname;
            }
        }

        $user->update();
        return view('admin.compte.editprofil');
    }

    public function donnesProfil()
    {
        return view('admin.compte.donnesprofil');
    }

/*********************************  DESIGNS   *************************** */
    public function designs()
    {
        $designs = Design::join('users', 'users.id', '=', 'designs.user_id')
            ->select('designs.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) as user_name"))
            ->where('designs.etat', '=', 'en attente')
            ->get();
        $category_design = CategoryDesign::all();


        return view('admin.designs.index', compact('designs'));
    }

    

    public function validerDesign($id)
    {
        $design = Design::find($id);
        $design->etat = 'valide';
        $design->update();
        $custom_products = ProduitPersonnaliser::where('design_id', $id)->get();

        foreach ($custom_products as $custom_product) {
            $custom_product->etat = 'valide';
            $custom_product->update();
        }

        return redirect()->back()->with('success', 'design valider');
    }

    public function designsvalidee()
    {
        $designs = Design::join('users', 'users.id', '=', 'designs.user_id')
            ->select('designs.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) as user_name"))
            ->where('designs.etat', '=', 'valide')
            ->get();
        $category_design = CategoryDesign::all();
        return view('admin.designs.validee', compact('designs'));
    }

    public function AdminSupprimerDesign($id)
    {
        $design = Design::find($id);
        $user_data = $design->user; // récupère toutes les données de l'utilisateur
        //dd($user_data->email);
        $file_path = public_path() . '/uploads/' . $design->photo;

        unlink($file_path);
        if ($design->delete()) {
            $mailable = new DesignSupprimer($user_data->name, $user_data->email);
            Mail::to($user_data->email)->send($mailable);
            return redirect()->back();
        } else {
            echo "error";
        }
    }

    

    public function commandes()
    {
        $commandes = Commande::where('etat', 'en attente')->get();
        return view('admin.commandes.index', compact('commandes'));
    }


    public function commandeDetail($id)
    {
        $lc = LigneCommande::find($id);
        return view('admin.commandes.detail', compact('lc'));
    }

    public function commandesValidee()
    { 
        $commandes = Commande::where('etat', 'en attente')->get();
        return view('admin.commandes.validee', compact('commandes'));
    }

    public function test(){
        return view('testpersonnalise');
    }
}
