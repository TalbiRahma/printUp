<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Suivi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuiviController extends Controller
{
    //

    public function suivire(Request $request)
    {
        $list_suivi = new Suivi();
        $list_suivi->member_id = Auth::id();
        $list_suivi->boutique_id = $request->input('boutique_id');
        $list_suivi->save();

        return redirect()->back();
    }

    public function nePlusSuivire($id)
    {
        $user = Auth::user();

        $suivi = Suivi::where('member_id', $user->id)->where('boutique_id', $id)->first();

        if ($suivi->delete()) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }


    /*public function search(Request $request)
    {
        $suivis = Suivi::join('boutiques', 'suivis.boutique_id', '=', 'boutiques.id')
        ->where('suivis.member_id', auth()->user()->id)
        ->where('boutiques.name', 'LIKE', '%' . $request->boutique_name . '%')
        ->get();

        //dd($suivis);

        return redirect()->back()->with('suivis');
    }*/
    
    /*public function search(Request $request)
    {
        //dd($request);
        $suivis = Suivi::where('member_id', auth()->user()->id)
        ->where('name', 'LIKE' , '%'. $request->boutique_name .'%')->get();

        return view('admin.produits.index' , compact('suivis'));
    }*/
}
