<?php

namespace App\Http\Controllers;

use App\Models\Design;
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
     
        return view('client.wishlist.design', compact('designs', 'category_product', 'category_design'));
    }

    public function addToWishlist(Request $request)
    {
        // Récupère l'ID du produit à ajouter à la liste des favoris
        $design_id = $request->input('design_id');

        // Vérifie si le produit est déjà dans la liste des favoris de l'utilisateur
        $wishlist = FavoriteDesign::where('user_id', Auth::id())->where('design_id', $design_id)->first();

        if ($wishlist) {
            return redirect()->back()->with('error', 'Le design que vous avez essayé d\'ajouter à votre liste de favoris est déjà présent.');
        }

        // Ajoute le produit à la liste des favoris de l'utilisateur
        $wishlist = new FavoriteDesign();
        $wishlist->user_id = Auth::id();
        $wishlist->design_id = $design_id;
        $wishlist->save();

        return redirect()->back()->with('success', 'Le Design a été ajouté à votre liste de favoris.');
    }


    public function deleteWishlist($id) {
        // Récupère l'utilisateur connecté
        $user = Auth::user();
        
        // Vérifie si le produit est dans la liste de favoris de l'utilisateur connecté
        $wishlist = FavoriteDesign::where('user_id', $user->id)->where('design_id', $id)->first();
        
        if ($wishlist->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }
}
