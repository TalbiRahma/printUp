<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Design;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use App\Models\ProduitPersonnaliser;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Symfony\Component\Console\Input\Input;

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
        $design_id = $request->input('id');
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
        
        // rediriger vers la page personnaliser
        return redirect()->back();
    }



    public function supprimerDesignFavori(Request $request, $id)
    {
        // Vérifier si les données stockées correspondent à l'ID du design à supprimer
        $design_data = $request->session()->get('design_data');

        // Supprimer les données du design favori
        $request->session()->forget('design_data');


        // Rediriger vers la page personnaliser avec l'affichage statique
        return redirect()->back();
    }


    public function createCustomProduct(Request $request)
    {
        // récupérer les données du produit initial et du design depuis la session ou le cookie
        $product_data = json_decode($request->session()->get('product_data'), true);
        $design_data = json_decode($request->session()->get('design_data'), true);

       

        // récupérer les identifiants du produit initial et du design sélectionné
        $initial_product_id = $product_data['id'];
        $sizes = $product_data['sizes'];
        $design_id = $design_data['id'];

        // récupérer les données du produit initial
        $initial_product = InitialProduct::find($initial_product_id);
        
        // récupérer les données du design sélectionné
        $design = Design::find($design_id);
       

        // créer une instance de produit_personnaliser
        $custom_product = new ProduitPersonnaliser();
        $custom_product->initial_product_id = $initial_product_id;
        $custom_product->design_id = $design_id;
        $custom_product->member_id = auth()->user()->id;
        $custom_product->name = $initial_product->name . ' ' . $design->name;
        $custom_product->description = $initial_product->description;
        $custom_product->price = $initial_product->price + $design->price;
        $custom_product->sizes = $sizes;
        
        $x = 100;
        $y = 100;
        // superposer le design sur le produit initial
        $img = ImageManagerStatic::make(public_path('uploads/' . $initial_product->photo));
        $design_img = ImageManagerStatic::make(public_path('uploads/' . $design->photo));
        $img->insert($design_img, 'top-left', $x, $y);
        $img_path = 'uploads/custom_products/' . time() . '-' . Str::random(10) . '.jpg';
        $img->save(public_path($img_path));
        
        // enregistrer les données du produit personnalisé dans la base de données
        $custom_product->photo = $img_path;
        //dd($custom_product);
        $custom_product->save();
        

        // créer un tableau JSON pour les informations de produit personnalisé
        $custom_product_data = [
            'id' => $custom_product->id,
            'name' => $custom_product->name,
            'description' => $custom_product->description,
            'price' => $custom_product->price,
            'photo' => asset($custom_product->photo),
            'sizes' => $sizes
        ];

         // transformer les données en JSON
         $custom_product_data_json = json_encode($custom_product_data);

         // stocker les données JSON dans un cookie ou dans la session
         $request->session()->put('custom_product_data', $custom_product_data_json);

        // renvoyer les informations du produit personnalisé en tant que réponse JSON
        return redirect()->back();
    }

    /* protected $x = 100;
       protected $y = 200;

    public function afficherImagePersonnalisee($id_produit, $id_design, $position_x, $position_y) {
    
        // Récupérer les données du produit initial et du design choisi
        $produit_initial = InitialProduct::find($id_produit);
        $design = Design::find($id_design);
    
        // Charger l'image du produit initial et du design
        $produit_initial_image = ImageManagerStatic::make(public_path('uploads/' . $produit_initial->photo));
        $design_image = ImageManagerStatic::make(public_path('uploads/' . $design->photo));
    
        // Redimensionner l'image du design pour qu'elle soit adaptée à la taille de l'image du produit initial
        $design_image->resize($produit_initial_image->width(), null, function ($constraint) {
            $constraint->aspectRatio();
        });
    
        // Appliquer le design sur l'image du produit initial à la position spécifiée
        $produit_initial_image->insert($design_image, 'top-left', $position_x, $position_y);
    
        // Afficher l'image personnalisée
        return $produit_initial_image->response();
    }
    
    
    public function afficherPagePersonnalisee($id_produit, $id_design, $position_x, $position_y) {

        // Appeler la fonction pour afficher l'image personnalisée
        $image_personnalisee = $this->afficherImagePersonnalisee($id_produit, $id_design, $position_x, $position_y);
    
        // Afficher la vue avec l'image personnalisée
        return view('page_personnalisee', ['image_personnalisee' => $image_personnalisee]);
    }*/

    /*  public function produitPersonnaliser()
{
   
    return view('test');
}


public function produitPersonnaliser2(Request $request)
{
    $shirtImage = ImageManagerStatic::make('uploads/T-shirt.jpg')->resize(900, 600);
    $uploadedImage = ImageManagerStatic::make($request->file('uploaded_file'))->resize(300, 200);
    
    // Insert the uploaded image at position (300, 200) on the shirt image
    $shirtImage->insert($uploadedImage, 'top-left', 300, 200);
    
    // Save the modified image to the "uploads" directory
    $imageName = time() . '.' . $request->file('uploaded_file')->getClientOriginalExtension();
    $shirtImage->save(public_path('uploads/' . $imageName));
    
    // Store the image name in the session for display in the view
    $request->session()->flash('image', $imageName);
    
    return redirect()->back()->with('shirtImage', $shirtImage);
}*/
}
