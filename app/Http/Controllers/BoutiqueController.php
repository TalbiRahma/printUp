<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Design;
use Illuminate\Http\Request;
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
        return view("client.boutiques.maboutique", compact('designs', 'boutique'));
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
