<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Commande;
use App\Models\Portmonnaie;
use App\Events\DeleteDesign;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Mail\DesignSupprimer;
use App\Models\LigneCommande;
use App\Mail\PaiementEffectue;
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


        if ($client->update()) {
            return redirect()->back()->with('warning1', 'Member bloquee');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function activerUser($iduser)
    {

        $client = User::find($iduser);
        $client->is_active = true;

        if ($client->update()) {
            return redirect()->back()->with('info1', 'Member activee');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
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

        $custom_products = ProduitPersonnaliser::where('design_id', $id)->get();

        foreach ($custom_products as $custom_product) {
            $custom_product->etat = 'valide';
            $custom_product->update();
        }

        if ($design->update()) {
            return redirect()->back()->with('success1', 'Le design a été validé');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
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


            return redirect()->back()->with('warning1', 'Le design a été supprimé et l\'email de suppression a été envoyé à la boîte mail de ce membre');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    /****************************************** COMMANDES    **************************/
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

    public function listCommandesValide()
    {
        $commandes = Commande::where('etat', 'valide')->get();
        return view('admin.commandes.validee', compact('commandes'));
    }

    public function validerCommande(Request $request)
    {
        $commande_id = $request->input('commande_id');
        $commande = Commande::find($commande_id);
        $commande->etat = 'valide';
        //dd($commande);
        if ($commande->update()) {
            return redirect()->back()->with('success1', 'La commande a été validé');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function marquerCommandePayer($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->paiement = 'payee';

        // Récupérer l'utilisateur qui a créé le design de chaque CustomProduct de la commande
        foreach ($commande->lignecommandes as $ligne_commande) {

            $montant = $ligne_commande->customproduct->design->price;
            $montant_totale = $montant * $ligne_commande->qte;
            $user = $ligne_commande->customproduct->design->user;
            $user_id = $user->id;
            $portemonnaie = Portmonnaie::where('user_id', $user_id)->first();

            if ($portemonnaie) {
                // Mettre à jour la colonne "montant_existe"
                $portemonnaie->solde += $montant_totale;
                $portemonnaie->save();
            } else {
                // Le portefeuille n'existe pas encore pour cet utilisateur, créer un nouveau portefeuille avec le montant initial
                $portemonnaie = new Portmonnaie;
                $portemonnaie->user_id = $user_id;
                $portemonnaie->solde = $montant_totale;
                //dd($portemonnaie);
                $portemonnaie->save();
            }
        }
        if ($commande->save()) {
            return redirect()->back()->with('success1', 'La commande a été marquée comme payée.');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        };
    }




    public function telechargerImage($nomImage)
    {
        $cheminImage = storage_path('app/public/uploads/' . $nomImage);
        return response()->download($cheminImage);
    }


    /****************************************** PAIEMENT    **************************/
    public function listePaiement()
    {
        $transactions = Transactions::with('membre')
            ->where('etat', 'demandee')
            ->get();

        return view('admin.paiement.index', compact('transactions'));
    }

    public function payer(Request $request)
    {
        $transaction_id = $request->input('transaction_id');
        $transaction = Transactions::find($transaction_id);
        if (!$transaction) {
            return redirect()->back()->with('danger1', 'Transaction non trouvée !');
        }


        $membre = $transaction->membre;
        $montant_demander = $transaction->montant_demander;
        $solde = $membre->portmonnaie->solde;
        if ($solde < $montant_demander) {
            return  redirect()->back()->with('danger1', 'Solde insuffisant !');
        }

        // Mettre à jour le solde du portefeuille du membre
        $nouveau_solde = $solde - $montant_demander;
        $portmonnaie = $membre->portmonnaie;
        $portmonnaie->solde = $nouveau_solde;
        $portmonnaie->save();

        // Mettre à jour la transaction
        $transaction->montant_transferts = $montant_demander;
        //$transaction->montant_demander = $transaction->montant_demander - $transaction->montant_transferts;
        $transaction->etat = 'transferee';
        //dd($transaction);
        $transaction->save();

        // Envoyer un e-mail de confirmation de paiement
        Mail::to($membre->email)->send(new PaiementEffectue($transaction));

        return redirect()->back()->with(['success' => 'Paiement effectué avec succès']);
    }


    public function historiquePaiement($id)
    {
        $membre = User::find($id);
        //dd($membre);
        $transactions = Transactions::with('membre')
            ->where('member_id', $id)
            ->get();
        return view('admin.paiement.historiquepaiement', compact('transactions', 'membre'));
    }

    public function historiques()
    {
        $transactions = Transactions::with('membre')
            ->where('etat', 'transferee')
            ->get();
        return view('admin.paiement.historiques', compact('transactions'));
    }
}
