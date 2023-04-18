<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    //
    public function index()
    {

        return view('admin.commandes.index');
    }
    public function detail(){
        
        return view('admin.commandes.detail');
    }
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

    public function listCommande(Request $request){
        
        return view('client.historiquecommande.detail');
    }
}
