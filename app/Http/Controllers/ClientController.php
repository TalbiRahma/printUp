<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Review;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    //

    public function account()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('client.compte.account', compact('designs', 'initial_products', 'category_product', 'category_design'));
    }


    public function updateAccount(Request $request)
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        $request->validate([
            'password' => 'confirmed',
        ], [
            'password.confirmed' => 'Le mot de passe et sa confirmation doivent être identiques.',
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
        return view('client.compte.account', compact('designs', 'initial_products', 'category_product', 'category_design'));
    }

    public function update(){
        return view('client.compte.update');
    }

    public function cart()
    {

        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();


        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        return view('client.cart', compact('designs', 'initial_products', 'category_product', 'category_design', 'commande'));
    }





    public function checkout()
    {
        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        $initial_products = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        // Vérifier si tous les designs dans les lignes de commande ont un état "valide"
        $tous_valides = true;
        foreach ($commande->lignecommandes as $ligne_commande) {
            
            $design = $ligne_commande->customproduct->design;
            if ($design->etat != 'valide') {
                $tous_valides = false;
                break;
            }
        }

        if ($tous_valides) {
            return view('client.checkout', compact('designs', 'initial_products', 'category_product', 'category_design', 'commande'));
        } else {
            return back()->with('warning1', 'Certains designs doivent être validés par l\'administration avant de pouvoir passer à la vérification du commande. ');
        }
        
    }





    public function addReview(Request $request)
    {
        // Créez un nouveau commentaire
        $review = new Review();
        $review->rate = $request->rate;
        $review->initial_product_id = $request->initial_product_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;

        // Enregistrez le commentaire dans la base de données
        $review->save();

        $reviews = Review::all();
        // Récupérez tous les commentaires pour le produit en question
        $reviews = Review::where('initial_product_id', $request->initial_product_id)->get();

        // Retournez la vue avec les commentaires récupérés et un message de succès
        return  redirect()->back()->with([
            'reviews' => $reviews,

        ]);
    }


    public function personaliser(Request $request)
    {
        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        $initial_product = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('client.personaliser', compact('designs', 'initial_product', 'category_product', 'category_design', 'commande'));
    }

    public function contact()
    {
        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        $initial_product = InitialProduct::all();
        $designs = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();

        return view('client.contact', compact('designs', 'initial_product', 'category_product', 'category_design', 'commande'));
    }

    public function contactSend(Request $request)
    {
        
        $details = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];
        
        Mail::to('printUp.laravel@gmail.com')->send(new ContactFormMail($details));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }
}
