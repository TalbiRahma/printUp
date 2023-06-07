<?php

namespace App\Http\Controllers;

use App\Models\ReviwDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviwDesignController extends Controller
{
    //
    public function addReview(Request $request)
    {   //dd($request);
        // Créez un nouveau commentaire
        $review = new ReviwDesign();
        $review->rate = $request->rate;
        $review->design_id = $request->design_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;

        // Enregistrez le commentaire dans la base de données
        $review->save();

        $reviews = ReviwDesign::all();
        // Récupérez tous les commentaires pour le produit en question
        $reviews = ReviwDesign::where('design_id', $request->design_id)->get();

        // Retournez la vue avec les commentaires récupérés et un message de succès
        return  redirect()->back()->with([
            'reviews' => $reviews,

        ]);
    }
}
