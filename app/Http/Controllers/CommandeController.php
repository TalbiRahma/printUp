<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Portmonnaie;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    //

    public function addCommande(Request $request)
    {

        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        //dd($commande);

        // creation commande 
        if ($commande) {
            //CHECK IF PRODUIT EXISTE
            $existe = false;
            foreach ($commande->lignecommandes as $lignec) {

                if ($lignec->custom_product_id == $request->custom_product_id && $lignec->selected_size == $request->selected_size) {
                    $existe = true;
                    $lignec->qte += $request->qte;
                    $lignec->update();
                }
            }

            if (!$existe) {
                // creation ligne de commande 
                $lc = new LigneCommande();
                $lc->qte = $request->qte;
                $lc->custom_product_id = $request->custom_product_id;
                $lc->selected_size = $request->input('selected_size');
                $lc->commande_id = $commande->id;
                $lc->save();
            }


            return redirect()->back()->with('SUCCESS', 'LE PRODUIT EST COMMANDER');
        } else {
            $commande = new Commande();
            $commande->member_id = Auth::user()->id;
            if ($commande->save()) {
                // creation ligne de commande 
                $lc = new LigneCommande();
                $lc->qte = $request->qte;
                $lc->custom_product_id = $request->custom_product_id;
                $lc->selected_size = $request->input('selected_size');
                $lc->commande_id = $commande->id;
                $lc->save();

                return redirect()->back()->with('SUCCESS', 'LE PRODUIT EST COMMANDER');
            } else {
                return redirect()->back()->with('error', 'impossible de commander le produit');
            }
        }
    }

    public function ligneCommandeDestroy($idlc)
    {
        $lc = LigneCommande::find($idlc);
        $lc->delete();
        return redirect()->back()->with('success', 'ligne de commande supprimer');
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

        return redirect()->back();
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
            'livraison' => 'required',


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
        $commandes->update();


        // Récupérer l'utilisateur qui a créé le design de chaque CustomProduct de la commande
        foreach ($commandes->lignecommandes as $ligne_commande) {
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
        return redirect('client/commande/historique');
    }

    public function listCommande()
    {

        return view('client.historiquecommande.detail');
    }

    public function historiqueCommande()
    { 
        $user = auth()->user();
        $commandes = Commande::where('member_id', '=', $user->id)
            ->whereIn('etat', ['en attente'])
            ->get();
        return view('client.commandes.historiquecommande', compact('commandes'));
    }

    public function detailCommande($id)
    {
        $lc = LigneCommande::find($id);
        return view('client.commandes.details', compact('lc'));
    }
}
