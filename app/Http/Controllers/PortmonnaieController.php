<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Commande;
use App\Models\Portmonnaie;
use App\Models\Transactions;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PortmonnaieController extends Controller
{
    //
    public function portemonnaie()
    {
        $user_id = auth()->user()->id; // Récupérer l'id de l'utilisateur connecté

        $commandes = Commande::whereHas('lignecommandes.customproduct.design.user', function ($query) use ($user_id) {
            $query->where('users.id', $user_id); // Sélectionner les designs qui ont été ajoutés par l'utilisateur connecté
        })
        ->where('paiement', 'payee')
        ->with(['lignecommandes.customproduct.design', 'lignecommandes.customproduct.initialProduct'])->get(); // Charger les relations avec la commande

        $tarnsactions = Transactions::where('member_id', $user_id)->get();
        /*$demande = Transactions::where('member_id', $user_id)
        ->where('etat', '=', 'demande')
        ->get(); 
        //dd($portemonnaie->solde);
        $rembourse = Transactions::where('member_id', $user_id)
        ->where('etat', '=', 'remboursé')
        ->get();*/ 
        return view('client.portemonnaie.index', compact('commandes', 'tarnsactions'));
    }

    public function ajouterCarte(Request $request)
    {
        // Récupère l'utilisateur connecté
        $user = auth()->user();

        if (!$user->portmonnaie) {
            // Si l'utilisateur n'a pas de portefeuille, créer un nouveau portefeuille pour l'utilisateur
            $portmonnaie = new Portmonnaie();
            $portmonnaie->solde = 0;
            $portmonnaie->user_id = $user->id;
            $portmonnaie->save();
        }

        // Valide les données du formulaire
        $validatedData = $request->validate([
            'procedure' => 'required',
            'Num_cart' => 'required',
        ]);
        // Met à jour les coordonnées de portefeuille de l'utilisateur
        $user->portmonnaie->Procedure = $validatedData['procedure'];
        $user->portmonnaie->Num_cart = $validatedData['Num_cart'];
        //dd($user->portmonnaie);
        if($user->portmonnaie->update()){
            return redirect()->back()->with('success1', 'Votre carte est ajouter avec successé !');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function modifierCarte(Request $request)
    {
        // Récupère l'utilisateur connecté
        $user = auth()->user();
        // Valide les données du formulaire
        $validatedData = $request->validate([
            'procedure' => 'required',
            'Num_cart' => 'required',
        ]);

        // Met à jour les coordonnées de portefeuille de l'utilisateur
        $user->portmonnaie->Procedure = $validatedData['procedure'];
        $user->portmonnaie->Num_cart = $validatedData['Num_cart'];
        //dd($user->portmonnaie);
        if($user->portmonnaie->update()){
            return redirect()->back()->with('success1', 'Votre carte est modifier avec successé !');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function demanderArgent(Request $request)
    {
        $montant = $request->input('montant_demander'); // Récupérer le montant de la demande d'argent
        //dd($montant);
        $user = auth()->user(); // Récupérer l'utilisateur connecté
        
        // Vérifier si l'utilisateur a un portefeuille actif
        if (!$user->portmonnaie->Num_cart) {
            return redirect()->back()->with('danger1', 'Ajouter une carte  !');
        } 
 
        // Vérifier si le montant est valide
        if ($montant > $user->portmonnaie->solde) {
            // Si le montant est supérieur au solde du portefeuille, retourner une erreur
            return redirect()->back()->withErrors(['montant' => 'Le montant demandé est supérieur au solde de votre portefeuille.']);
        }

        // Créer une nouvelle transaction
        $transaction = new Transactions();
        $transaction->member_id = $user->id;
        $transaction->montant = $montant;
        $transaction->type = 'demande';
        $transaction->etat = '0';
        //$transaction->solde = $transaction->membre->portmonnaie->solde;
        //dd($transaction);
        $transaction->save();
        
        return redirect()->back()->with('success1', 'Votre demande d\'argent a été enregistrée avec succès.');
    }
}
