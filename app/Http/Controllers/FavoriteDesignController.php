<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\FavoriteDesign;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;

class FavoriteDesignController extends Controller
{
    //
    public function designWishlist()
    {
        
        // Récupère la liste des produits favoris de l'utilisateur
        $wishlist = FavoriteDesign::where('user_id', Auth::id())->get();
        $designs = [];
    
        // Récupère les détails des produits favoris
        foreach ($wishlist as $item) {
            $design = Design::find($item->design_id);
            if ($design) {
                $designs[] = $design;
            }
        }
        
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        return view('client.wishlist.design', compact('designs', 'category_product', 'category_design','commande'));
    }

    public function addToWishlist($id)
    {   //dd($id);
        // Récupère l'ID du produit à ajouter à la liste des favoris
        $design_id = $id;

        // Vérifie si le produit est déjà dans la liste des favoris de l'utilisateur
        $wishlist = FavoriteDesign::where('user_id', Auth::id())->where('design_id', $design_id)->first();

        if ($wishlist) {
            return redirect()->back()->with('danger1', 'Le design que vous avez essayé d\'ajouter à votre liste de favoris est déjà présent.');
        } 

        // Ajoute le produit à la liste des favoris de l'utilisateur
        $wishlist = new FavoriteDesign();
        $wishlist->user_id = Auth::id();
        $wishlist->design_id = $design_id;
        

        if ($wishlist->save()){
            return redirect()->route('design.wishlist')->with('success1', 'Le Design a été ajouté à votre liste de favoris.');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
        
    }


    public function deleteWishlist($id) {
        // Récupère l'utilisateur connecté
        $user = Auth::user();
        
        // Vérifie si le produit est dans la liste de favoris de l'utilisateur connecté
        $wishlist = FavoriteDesign::where('user_id', $user->id)->where('design_id', $id)->first();
        
        if ($wishlist->delete()){
            return redirect()->back()->with('success1', 'Le Design a été supprimé.');
        }else{
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }
}
