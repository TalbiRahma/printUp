<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Suivi;
use App\Models\Design;
use App\Models\Boutique;
use App\Models\Commande;
use App\Models\Portmonnaie;
use App\Events\DeleteDesign;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Mail\DesignSupprimer;
use App\Models\LigneCommande;
use App\Mail\PaiementEffectue;
use App\Models\CategoryDesign;
use App\Models\FavoriteDesign;
use App\Models\InitialProduct;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\DB;

use App\Models\ProduitPersonnaliser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    public function filtrerUser(Request $request)
    {
        $memberStatus = $request->input('member_status');

        // Récupérer les commandes en fonction du statut de paiement
        if ($memberStatus == 'tous') {
            $clients = User::where('role', 'user')->latest()->paginate(10);
        } else {
            $clients = User::where('is_active', $memberStatus)
                ->where('role', 'user')->latest()
                ->paginate(10);
        }

        // Faire quelque chose avec les commandes filtrées (par exemple, les afficher dans une vue)
        return view('admin.clients.index')->with('clients', $clients);
    }

    public function modifProfil()
    {
        return view('admin.compte.editprofil');
    }

    public function maBoutique()
    {
        $category_design = CategoryDesign::all();
        $boutique_id = Auth::user()->boutique->id;
        $boutique = Boutique::where('id', $boutique_id)->first();
        $designs = Design::where('boutique_id', $boutique_id)
            ->where('visibility', true)
            ->get();

        $list_suivis = Suivi::where('member_id', auth()->user()->id)->get();
        $suivis = [];

        // Récupère les détails des suivis
        foreach ($list_suivis as $item) {
            $suivi = Boutique::find($item->boutique_id);
            if ($suivi) {
                $suivis[] = $suivi;
            }
        }

        // Récupère la liste des produits favoris de l'utilisateur
        $product_wishlist = FavoriteProduct::where('user_id', auth()->user()->id)->get();
        $initial_products = [];

        // Récupère les détails des produits favoris
        foreach ($product_wishlist as $item) {
            $product = InitialProduct::find($item->initial_product_id);
            if ($product) {
                $initial_products[] = $product;
            }
        }

        // Récupère la liste des designs favoris de l'utilisateur
        $design_wishlist = FavoriteDesign::where('user_id', auth()->user()->id)->get();
        $faivorite_designs = [];

        // Récupère les détails des designs favoris
        foreach ($design_wishlist as $item) {
            $fdesign = Design::find($item->design_id);
            if ($fdesign) {
                $faivorite_designs[] = $fdesign;
            }
        }
        return view('admin.compte.pUboutique', compact('category_design', 'designs', 'boutique', 'suivis', 'initial_products', 'faivorite_designs'));
    }

    public function ajouterDesignPrintUp(Request  $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);

        $id = mt_rand(100000, 999999);
        $design = new Design();
        $design->id = $id;
        $design->name = $request->name;
        $design->category_design_id = $request->category_design;
        $design->description = $request->description;
        $design->price = $request->price;
        $design->user_id = $request->user_id;
        $design->boutique_id = $request->boutique_id;
        $design->visibility = true;
        $design->etat = 'valide';

        //upload image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname .= "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath, $newname);

        $design->photo = $newname;


        // Ajouter les données du design dans le tableau JSON dans la session
        /*$design_data = $request->session()->get('design_data', []); 
        $design_data = [
            'id' => $design->id,
            'name' => $design->name,
            'description' => $design->description,
            'photo' => $design->photo,
            'price' => $design->price,
            'user_id' => $design->user_id,
            'category_design_id' => $design->category_design_id,
        ];

        $design_data_json = json_encode($design_data);
        $request->session()->put('design_data', $design_data_json);*/

        if ($design->save()) {
            return redirect()->back()->with('design', $design)->with('success1', 'Votre design a été ajouté avec succès !');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
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

        if ($user->update()) {
            return view('admin.compte.editprofil')->with('success1', 'success !');
        }else{
            return view('admin.compte.editprofil')->with('danger', 'error !');
        }
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
            ->latest()->paginate(3);
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
            ->latest()->paginate(3);
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
        /*foreach ($commandes as $commande) {
            $lignesCommande = $commande->lignecommandes;
            //dd($lignesCommande);

            foreach ($lignesCommande as $ligneCommande) {
                $produitsPersonnalises = $ligneCommande->customproduct;
                //dd($produitsPersonnalises);
            }
        }*/
        return view('admin.commandes.validee', compact('commandes'));
    }

    public function validerCommande(Request $request)
    {
        $commande_id = $request->input('commande_id');
        $commande = Commande::find($commande_id);
        $commande->etat = 'valide';
        //dd($commande);

        // Récupérer les produits personnalisés pour chaque ligne de commande
        /*$produitsPersonnalises = [];
        foreach ($commande->lignecommandes as $lc) {
            $produitsPersonnalises[] = $lc->customproduct;
            //dd($produitsPersonnalises);
        }
        // Récupérer les produits personnalisés
        /*$produitsPersonnalises = [];
        foreach ($commande->lignecommandes as $lc) {
            
            $customproduct[] = $lc->customproduct;
            d
            }
        //$produitsPersonnalises[] = $lignecommandes->custom_product;
        // Convertir en JSON
        $produitsPersonnalisesJson = json_encode($produitsPersonnalises);*/
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
            $montant_total = $montant * $ligne_commande->qte;
            $user = $ligne_commande->customproduct->design->user;
            $user_id = $user->id;
            $portemonnaie = Portmonnaie::where('user_id', $user_id)->first();
            $transaction = new Transactions();
            $transaction->member_id = $user_id;
            $transaction->montant = $montant_total;
            $transaction->type = 'revenu';


            if ($portemonnaie) {
                // Mettre à jour la colonne "montant_existe"
                $portemonnaie->solde += $montant_total;
                $portemonnaie->save();
            } else {
                // Le portefeuille n'existe pas encore pour cet utilisateur, créer un nouveau portefeuille avec le montant initial
                $portemonnaie = new Portmonnaie;
                $portemonnaie->user_id = $user_id;
                $portemonnaie->solde = $montant_total;
                //dd($portemonnaie);
                $portemonnaie->save();
            }
            $transaction->solde = $portemonnaie->solde;
            $transaction->save();
        }

        if ($commande->save()) {
            return redirect()->route('commandes.validee')->with('success1', 'La commande a été marquée comme payée.');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }


    public function filtrerCommandes(Request $request)
    {
        $paymentStatus = $request->input('payment_status');

        // Récupérer les commandes en fonction du statut de paiement
        if ($paymentStatus == 'tous') {
            $commandes = Commande::where('etat', 'valide')->get();
        } else {
            $commandes = Commande::where('paiement', $paymentStatus)
                ->where('etat', 'valide')
                ->get();
        }

        // Faire quelque chose avec les commandes filtrées (par exemple, les afficher dans une vue)
        return view('admin.commandes.validee', compact('commandes'));
    }

    /*public function telechargerImage($nomImage)
    {
        $cheminImage = storage_path('app/public/uploads/' . $nomImage);
        return response()->download($cheminImage);
    }*/

    /*public function telechargerImage($id)
    {
        $custom_product = ProduitPersonnaliser::find($id);
        $image = $custom_product->getFirstMedia('uploads/custom_products');
        return $image;
    }*/



    public function telechargerImage($id)
    {
        $custom_product = ProduitPersonnaliser::find($id);
        $media = $custom_product->getFirstMediaUrl('custom_products');
        dd($media);
        if (!$media) {
            // Gérer le cas où il n'y a pas de fichier multimédia associé
            // Par exemple, afficher un message d'erreur ou rediriger l'utilisateur
            return redirect()->back()->with('error', 'Aucune image trouvée pour ce produit personnalisé.');
        }

        // Obtenir le chemin de stockage du fichier multimédia
        $cheminFichier = $media->getPath();
        //dd($cheminFichier);
        // Télécharger le fichier multimédia
        return Storage::download($cheminFichier);
    }



    /****************************************** PAIEMENT    **************************/
    public function listePaiement()
    {
        $transactions = Transactions::with('membre')
            ->where('type', 'demande')
            ->where('etat', '0')
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
        $montant_demander = $transaction->montant;
        $solde = $membre->portmonnaie->solde;

        if ($solde < $montant_demander) {
            return  redirect()->back()->with('danger1', 'Solde insuffisant !');
        }

        // Mettre à jour le solde du portefeuille du membre
        $portmonnaie = $membre->portmonnaie;
        $portmonnaie->solde = $solde - $montant_demander;
        $portmonnaie->save();


        if (!$portmonnaie->save()) {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }

        // Mettre à jour la transaction
        $transaction->etat = '1';
        $transaction->update();

        $new_transaction = new Transactions();
        $new_transaction->member_id = $membre->id;
        $new_transaction->montant = $montant_demander;
        $new_transaction->solde = $portmonnaie->solde + $montant_demander;
        $new_transaction->type = 'remboursé';
        //$transaction->solde = $nouveau_solde;
        //dd($transaction);

        if ($new_transaction->save()) {
            // Envoyer un e-mail de confirmation de paiement
            Mail::to($membre->email)->send(new PaiementEffectue($transaction));
            return redirect()->back()->with(['success1' => 'Paiement effectué avec succès']);
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
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
            ->where('type', 'remboursé')
            ->get();
        return view('admin.paiement.historiques', compact('transactions'));
    }
}
