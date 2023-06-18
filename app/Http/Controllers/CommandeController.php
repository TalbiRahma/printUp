<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Portmonnaie;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\ProduitPersonnaliser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    //
    /*public function addCommande(Request $request)
{
    $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();

    // Vérification de l'existence de la commande
    if ($commande) {
        $existe = false;
        foreach ($commande->lignecommandes as $lignec) {
            if ($lignec->custom_product_id == $request->custom_product_id && $lignec->selected_size == $request->selected_size) {
                $existe = true;
                $lignec->qte += $request->qte;
                $lignec->update();
            }
        }

        if (!$existe) {
            // Création de la ligne de commande
            $lc = new LigneCommande();
            if ($request->qte) {
                $lc->qte = $request->qte;
            } else {
                return redirect()->back()->with('danger', 'La quantité est nulle.');
            }
            
            // Vérification de la sélection de la taille si le produit personnalisé a des tailles
            $customProduct = ProduitPersonnaliser::find($request->custom_product_id);
            if ($customProduct->sizes !== null && empty($request->selected_size)) {
                return redirect()->back()->with('danger', 'Veuillez sélectionner une taille.');
            }
            
            $lc->custom_product_id = $request->custom_product_id;
            $lc->selected_size = $request->input('selected_size');
            $lc->commande_id = $commande->id;
            $lc->save();
        }
        return redirect()->back()->with('success', 'LE PRODUIT EST COMMANDÉ');
    } else {
        $commande = new Commande();
        $commande->member_id = Auth::user()->id;
        if ($commande->save()) {
            // Création de la ligne de commande
            $lc = new LigneCommande();
            if ($request->qte) {
                $lc->qte = $request->qte;
            } else {
                return redirect()->back()->with('danger', 'La quantité est nulle.');
            }
            // Vérification de la sélection de la taille si le produit personnalisé a des tailles
            $customProduct = ProduitPersonnaliser::find($request->custom_product_id);
            //dd($customProduct->sizes);
            if ($customProduct->sizes !== null && empty($request->selected_size)) {
                return redirect()->back()->with('danger', 'Veuillez sélectionner une taille.');
            }
            $lc->custom_product_id = $request->custom_product_id;
            $lc->selected_size = $request->input('selected_size');
            $lc->commande_id = $commande->id;
            $lc->save();
            return redirect()->back()->with('success', 'LE PRODUIT EST COMMANDÉ');
        } else {
            return redirect()->back()->with('danger', 'Impossible de commander le produit');
        }
    }
}*/

public function addCommande(Request $request)
{
        //dd($request);
    $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();

    // Vérification de l'existence de la commande
    if ($commande) {
        $existe = false;
        foreach ($commande->lignecommandes as $lignec) {
            if ($lignec->custom_product_id == $request->custom_product_id && $lignec->selected_size == $request->selected_size) {
                $existe = true;
                if ($request->qte) {
                    $lignec->qte = $request->qte;
                } else {
                    return redirect()->back()->with('danger1', 'La quantité est nulle.');
                }
                $lignec->update();
            }
        }

        if (!$existe) {
            // Création de la ligne de commande
            $lc = new LigneCommande();
            if ($request->qte) {
                $lc->qte = $request->qte;
            } else {
                return redirect()->back()->with('danger1', 'La quantité est nulle.');
            }

            // Vérification de la sélection de la taille si le produit personnalisé a des tailles
            $customProduct = ProduitPersonnaliser::find($request->custom_product_id);
            if ($customProduct->sizes !== "[]" && $request->selected_size === null) {
                return redirect()->back()->with('danger1', 'Veuillez sélectionner une taille.');
            }

            $lc->custom_product_id = $request->custom_product_id;
            $lc->selected_size = $request->input('selected_size');
            $lc->commande_id = $commande->id;
            $lc->save();
        } 
        return redirect()->back()->with('success1', 'LE PRODUIT EST COMMANDÉ');
    } else {
        $commande = new Commande();
        $commande->member_id = Auth::user()->id;
        if ($commande->save()) {
            // Création de la ligne de commande
            $lc = new LigneCommande();
            if ($request->qte) {
                $lc->qte = $request->qte;
            } else {
                return redirect()->back()->with('danger1', 'La quantité est nulle.');
            }

            // Vérification de la sélection de la taille si le produit personnalisé a des tailles
            $customProduct = ProduitPersonnaliser::find($request->custom_product_id);
            if ($customProduct->sizes !== "[]" && $request->selected_size === null) {
                return redirect()->back()->with('danger1', 'Veuillez sélectionner une taille.');
            }

            $lc->custom_product_id = $request->custom_product_id;
            $lc->selected_size = $request->input('selected_size');
            $lc->commande_id = $commande->id;
            $lc->save();
            return redirect()->back()->with('success1', 'LE PRODUIT EST COMMANDÉ');
        } else {
            return redirect()->back()->with('danger1', 'Impossible de commander le produit');
        }
    }
}


    public function ligneCommandeDestroy($idlc)
    {
        $lc = LigneCommande::find($idlc);
        if($lc->delete()){
            return redirect()->back()->with('success1', 'ligne de commande supprimer');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
        
    }

    public function updateLigne(Request $request)
    {
        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();

        foreach ($commande->lignecommandes as $lc) {
            $qte = $request->input('qte.' . $lc->id);
            if ($qte !== null) { // si la quantité a été envoyée pour cette ligne
                $lc->qte = $qte;
                $lc->save();
            }
        }
        if( $lc->save() && $qte !== null ){
            return redirect()->back()->with('success1', 'ligne de commande a été mise à jour avec successé');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function validerCommandes(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'region' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'paiement' => 'required|max:255',


        ]);
        // stocker les données dans un tableau JSON
        $commande_data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'region' => $request->region,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
        ];

        // transformer les données en JSON
        $commande_data_json = json_encode($commande_data);


        $commandes = Commande::find($request->commande_id);


        $commandes->coordonnees = $commande_data;
        $commandes->etat = "en attente";
        $commandes->paiement = $request->paiement;
       
        if ($commandes->update()){
            //dd($commandes);
            return redirect('client/commande/historique')->with('success1', 'Votre commande a été envoyée avec succès');
        }else{
            //return redirect('client/commande/historique')->with('danger1', 'Une erreur s\'est produite !');
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
        
    }

    public function listCommande()
    {

        return view('client.historiquecommande.detail');
    }

    public function historiqueCommande()
    { 
        $user = auth()->user();
        $commandes = Commande::where('member_id', '=', $user->id)
            ->whereIn('etat', ['en attente' , 'valide' ])
            ->get();
        return view('client.commandes.historiquecommande', compact('commandes'));
    }

    public function detailCommande($id)
    {
        $lc = LigneCommande::find($id);
        return view('client.commandes.details', compact('lc'));
    }
}
