<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\Auth;

class FavoriteProductController extends Controller
{
    //
    public function productWishlist()
    {
        
        // Récupère la liste des produits favoris de l'utilisateur
        $wishlist = FavoriteProduct::where('user_id', Auth::id())->get();
        $initial_products = [];
    
        // Récupère les détails des produits favoris
        foreach ($wishlist as $item) {
            $product = InitialProduct::find($item->initial_product_id);
            if ($product) {
                $initial_products[] = $product;
            }
        }
        
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
    
        return view('client.wishlist.product', compact('initial_products', 'category_product', 'category_design'));
    }

    public function addToWishlist(Request $request)
    {
        // Récupère l'ID du produit à ajouter à la liste des favoris
        $product_id = $request->input('product_id');

        // Vérifie si le produit est déjà dans la liste des favoris de l'utilisateur
        $wishlist = FavoriteProduct::where('user_id', Auth::id())->where('initial_product_id', $product_id)->first();

        if ($wishlist) {
            return redirect()->back()->with('error', 'Le produit que vous avez essayé d\'ajouter à votre liste de favoris est déjà présent.');
        }

        // Ajoute le produit à la liste des favoris de l'utilisateur
        $wishlist = new FavoriteProduct();
        $wishlist->user_id = Auth::id();
        $wishlist->initial_product_id = $product_id;
        $wishlist->save();

        return redirect()->back()->with('success', 'Le produit a été ajouté à votre liste de favoris.');
    }


    public function deleteWishlist($id) {
        // Récupère l'utilisateur connecté
        $user = Auth::user();
        
        // Vérifie si le produit est dans la liste de favoris de l'utilisateur connecté
        $wishlist = FavoriteProduct::where('user_id', $user->id)->where('initial_product_id', $id)->first();
        
        if ($wishlist->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }
}
