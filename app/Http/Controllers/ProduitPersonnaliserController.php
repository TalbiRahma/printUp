<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;
use Intervention\Image\ImageManagerStatic as Image;

class ProduitPersonnaliserController extends Controller
{
    //

    public function sendToPersonnaliser($id)
    {

        $initial_product = InitialProduct::find($id);
        //dd($initial_product);
        $design = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $user = auth()->user();
        $mes_design =  Design::where('user_id', $user->id)->get();
        $favorite_designs = Auth::user()->designs;
        $favorite_products = Auth::user()->initialProducts;

        return view('client.personaliser', compact(
            'design',
            'initial_product',
            'category_product',
            'category_design',
            'favorite_designs',
            'favorite_products',
            'mes_design'
        ));
    }



    public function modifierProduitInitial(Request $request)
    {
        // récupérer les données du produit initial ici
        $product_id = $request->input('id_produit_favori');
        $product = InitialProduct::find($product_id);

        // stocker les données dans un tableau JSON
        $product_data = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'photo' => $product->photo,
            'sizes' => $product->sizes,
            'category_product_id' => $product->category_product_id
        ];

        $product_data_json = json_encode($product_data);
        //dd($product_data_json);
        // stocker les données JSON dans un cookie ou dans la session
        $request->session()->put('product_data', $product_data_json);
        //$product_data = $request->session()->get('product_data');
        //dd($product_data);
        // rediriger vers la page personnaliser
        return redirect()->back();
    }


    public function modifierDesignFavori(Request $request)
    {
        
        // récupérer les données du design favori ici
        $design_id = $request->input('id_design_favori');
        $fdesign = Design::find($design_id);

        // stocker les données dans un tableau JSON
        $design_data = [
            'id' => $fdesign->id,
            'name' => $fdesign->name,
            'description' => $fdesign->description,
            'photo' => $fdesign->photo,
            'price' => $fdesign->price,
            'user_id' => $fdesign->user_id,
            'category_design_id' => $fdesign->category_design_id,
        ];

        // transformer les données en JSON
        $design_data_json = json_encode($design_data);

        // stocker les données JSON dans un cookie ou dans la session
        $request->session()->put('design_data', $design_data_json);
        //$design_data = $request->session()->get('design_data');
        //dd($design_data);
        // rediriger vers la page personnaliser
        return redirect()->back();
    }

    public function modifierMesDesign(Request $request)
{
    // récupérer les données du design sélectionné dans la liste des designs de l'utilisateur connecté
    $design_id = $request->input('mon_design_id');
    $mdesign = Auth::user()->designs()->where('id', $design_id)->first();

    // récupérer le design favori s'il existe
    $fdesign = null;
    if (Auth::user()->favorite_design_id) {
        $fdesign = Design::find(Auth::user()->favorite_design_id);
    }

    // stocker les données dans un tableau JSON
    $design_data = [
        'id' => $mdesign->id,
        'name' => $mdesign->name,
        'description' => $mdesign->description,
        'photo' => $mdesign->photo,
        'price' => $mdesign->price,
        'user_id' => $mdesign->user_id,
        'category_design_id' => $mdesign->category_design_id,
    ];

    // si le design favori existe, remplacer les données du design sélectionné par celles du design favori
    if ($fdesign) {
        $design_data['id'] = $fdesign->id;
        $design_data['name'] = $fdesign->name;
        $design_data['description'] = $fdesign->description;
        $design_data['photo'] = $fdesign->photo;
        $design_data['price'] = $fdesign->price;
        $design_data['user_id'] = $fdesign->user_id;
        $design_data['category_design_id'] = $fdesign->category_design_id;
    }

    // transformer les données en JSON
    $design_data_json = json_encode($design_data);

    // stocker les données JSON dans un cookie ou dans la session
    $request->session()->put('design_data', $design_data_json);

    // rediriger vers la page personnaliser
    return redirect()->back();
}


   /* public function modifierMesDesign(Request $request)
    {
        $request->session()->forget('design_data');
        // récupérer les données du design favori ici
        $design_id = $request->input('mon_design_id');
        $mon_design = Design::find($design_id);

        // stocker les données dans un tableau JSON
        $mon_design_data = [
            'id' => $mon_design->id,
            'name' => $mon_design->name,
            'description' => $mon_design->description,
            'photo' => $mon_design->photo,
            'price' => $mon_design->price,
            'user_id' => $mon_design->user_id,
            'category_design_id' => $mon_design->category_design_id,
        ];

        // transformer les données en JSON
        $mon_design_data_json = json_encode($mon_design_data);

        // stocker les données JSON dans un cookie ou dans la session
        $request->session()->put('mon_design_data', $mon_design_data_json);
        //$design_data = $request->session()->get('design_data');
        dd($mon_design_data);
        // rediriger vers la page personnaliser
        return redirect()->back();
    }*/
        



    /*public function modifierProduitInitial(Request $request)
    {
        $design = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $user = auth()->user();
        $mes_design =  Design::where('user_id', $user->id)->get();
        $favorite_designs = Auth::user()->designs;
        $favorite_products = Auth::user()->initialProducts;



        $product_id = $request->input('id_produit_favori');
        $product = InitialProduct::find($product_id);

        // récupérer les autres données nécessaires ici

        return view('client.personaliser', compact(
            'design',
            'product',
            'category_product',
            'category_design',
            'favorite_designs',
            'favorite_products',
            'mes_design'
        ));
    }*/


    /*
    public function modifierDesignFavori(Request $request)
    {
        $design = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $user = auth()->user();
        $mes_design =  Design::where('user_id', $user->id)->get();
        $favorite_designs = Auth::user()->designs;
        $favorite_products = Auth::user()->initialProducts;
        



        $design_id = $request->input('id_design_favori');
        $fdesign = Design::find($design_id);

        // Récupérer les informations du produit actuellement affiché ici
        $initial_product = InitialProduct::find($product_id);
        // récupérer les autres données nécessaires ici

        return response()->json([
            'fdesign' => $fdesign,
            'initial_product' => $initial_product
        ]);
    }*/


    /* public function modifierDesignFavori(Request $request)
{
    $design_id = $request->input('id_design_favori');
    $fdesign = Design::find($design_id);

    // récupérer les autres données nécessaires ici

    return response()->json([
        'name' => $fdesign->name,
        'boutique' => $fdesign->boutique,
        'category' => $fdesign->category,
        'price' => $fdesign->price,
        'photo' => asset('uploads/' . $fdesign->photo),
    ]);
}*/



    public function produitPersonnaliser()
    {
        // create new Intervention Image
        $img = ImageManagerStatic::make('/uploads/T-shirt.jpg');

        // paste another image
        $img->insert('/uploads/design.png');

        // create a new Image instance for inserting
        // $watermark = Image::make('public/design.png');
        //$img->insert($watermark, 'center');

        // insert watermark at bottom-right corner with 10px offset
        //$img->insert('public/watermark.png', 'bottom-right', 10, 10);

        return view('test');
    }
}
