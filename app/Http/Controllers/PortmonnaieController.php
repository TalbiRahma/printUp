<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Commande;
use App\Models\Portmonnaie;
use App\Models\Transactions;
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
        //dd($portemonnaie->solde);
        return view('client.portemonnaie.index', compact('commandes', ));
    }

    public function modifierCoordonnees(Request $request)
    {
        // Récupère l'utilisateur connecté
        $user = auth()->user();
        // Valide les données du formulaire
        $validatedData = $request->validate([
            'procedure' => ['required', 'string'],
            'Num_cart' => 'required',
        ]);

        // Met à jour les coordonnées de portefeuille de l'utilisateur
        $user->portmonnaie->procedure = $validatedData['procedure'];
        $user->portmonnaie->Num_cart = $validatedData['Num_cart'];
        $user->portmonnaie->save();
        return redirect()->back();
    }



    public function demanderArgent(Request $request)
    {
        $montant = $request->input('montant_demander'); // Récupérer le montant de la demande d'argent
        
        $user = auth()->user(); // Récupérer l'utilisateur connecté
        
        // Vérifier si l'utilisateur a un portefeuille actif
        if (!$user->portmonnaie) {
            // Si l'utilisateur n'a pas de portefeuille, créer un nouveau portefeuille pour l'utilisateur
            $portmonnaie = new Portmonnaie();
            $portmonnaie->montant_existe = 0;
            $portmonnaie->membre_id = $user->id;
            $portmonnaie->save();
        } 

        // Vérifier si le montant est valide
        if ($montant > $user->portmonnaie->montant_existe) {
            // Si le montant est supérieur au solde du portefeuille, retourner une erreur
            return redirect()->back()->withErrors(['montant' => 'Le montant demandé est supérieur au solde de votre portefeuille.']);
        }

        // Créer une nouvelle transaction
        $transaction = new Transactions();
        $transaction->montant_demander = $montant;
        $transaction->member_id = $user->id;
        $transaction->save();

        return redirect()->back()->with('success', 'Votre demande d\'argent a été enregistrée avec succès.');
    }
}
