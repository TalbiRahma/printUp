<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Commande;
use App\Models\Portmonnaie;
use Illuminate\Http\Request;

class PortmonnaieController extends Controller
{
    //
    public function index()
    {

        return view('admin.paiement.index');
    }

    public function historiquePaiement()
    {

        return view('admin.paiement.historiquepaiement');
    }
    public function historiques()
    {

        return view('admin.paiement.historiques');
    }

    public function portemonnaie()
    {
        $user_id = auth()->user()->id; // Récupérer l'id de l'utilisateur connecté

        $commandes = Commande::whereHas('lignecommandes.customproduct.design.user', function ($query) use ($user_id) {
            $query->where('users.id', $user_id); // Sélectionner les designs qui ont été ajoutés par l'utilisateur connecté
        })->with(['lignecommandes.customproduct.design', 'lignecommandes.customproduct.initialProduct'])->get(); // Charger les relations avec la commande

        //$portemonnaie = Portmonnaie::where('user_id', $user_id)->get(); 

        $montants_transferts = User::with(['portmonnaie' => function ($query) {
            $query->select('montant_transferts', 'created_at');
        }])->findOrFail($user_id)->portmonnaie;


        return view('client.portemonnaie.index', compact('commandes', 'montants_transferts'));
    }

    public function modifierCoordonnees(Request $request)
    {
        // Récupère l'utilisateur connecté
        $user = auth()->user();
        // Valide les données du formulaire
        $validatedData = $request->validate([
            'procedure' => ['required', 'string'],
            'Num_cart' => ['required', 'string', 'regex:/^\d{16}$/'],
          ], [
            'Num_cart.regex' => 'Le numéro de carte doit être composé exactement de 16 chiffres.',
          ]);

        // Met à jour les coordonnées de portefeuille de l'utilisateur
        $user->portmonnaie->procedure = $validatedData['procedure'];
        $user->portmonnaie->Num_cart = $validatedData['card_number'];
        $user->portmonnaie->save();
        dd($user->portmonnaie);
        return redirect()->back();
    }
}
