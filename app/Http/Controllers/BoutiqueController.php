<?php

namespace App\Http\Controllers;

use App\Models\Suivi;
use App\Models\Design;
use App\Models\Boutique;
use App\Models\FavoriteDesign;
use Illuminate\Http\Request;
use App\Models\InitialProduct;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\Auth;

class BoutiqueController extends Controller
{
    // 
    public function maboutique()
    {
        $boutique_id = Auth::user()->boutique->id;
        $boutique = Boutique::where('id', $boutique_id)->first();
        $designs = Design::where('boutique_id', $boutique_id)
            ->where('visibility', true)
            ->where('etat', 'valide')
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
        //dd($initial_products);
        return view("client.boutiques.maboutique", compact('designs', 'boutique', 'suivis', 'initial_products', 'faivorite_designs'));
    }

    public function aadToBoutique(Request $request)
    {
        //dd($request);
        $design = Design::where('id', $request->design_id)->first();

        if ($design) {
            $design->visibility = true;
            $design->save();
            if ($design->etat == 'en attente') {
                return redirect()->back()->with('info1', 'Votre design doit être validé par l\'administration. Veuillez réessayer ultérieurement. !');
            }
            return redirect()->back()->with('success1', 'Votre design a été exposé avec succès !');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    } 

    public function removeFromBoutique(Request $request)
    {
        //dd($request);
        $design = Design::where('id', $request->design_id)->first();

        if ($design) {
            $design->visibility = false;
            $design->save();

            return redirect()->back()->with('success1', 'Votre design a été retiré avec succès !');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }

    public function editBoutique(Request $request)
    {
        //dd($request);
        $boutique = Boutique::where('id', $request->boutique_id)->first();
        //dd($boutique);
        $boutique->name = $request->name;
        $boutique->biographie = $request->bio;

        //upload image 
        if ($request->file('photo')) {
            if ($boutique->photo) {
                //supprimer ancienne photo
                $file_path = public_path() . '/uploads/' . $boutique->photo;
                unlink($file_path);

                //upload nv photo
                $newname = uniqid();
                $image = $request->file('photo');
                $newname .= "." . $image->getClientOriginalExtension();
                $destinationPath = 'uploads';
                $image->move($destinationPath, $newname);
                $boutique->photo = $newname;
            } else {
                //upload nv photo
                $newname = uniqid();
                $image = $request->file('photo');
                $newname .= "." . $image->getClientOriginalExtension();
                $destinationPath = 'uploads';
                $image->move($destinationPath, $newname);
                $boutique->photo = $newname;
            }
        }

        if ($boutique->update()) {
            return redirect()->back()->with('success1', 'Votre données a été modifiées avec succès !');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }
}
