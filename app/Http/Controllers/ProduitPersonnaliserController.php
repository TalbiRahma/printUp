<?php

namespace App\Http\Controllers;

use App\Models\Design;

use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\CategoryDesign;
use App\Models\InitialProduct;
use App\Models\CategoryProduct;
use App\Models\ProduitPersonnaliser;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Symfony\Component\Console\Input\Input;
use Intervention\Image\Facades\Image;


class ProduitPersonnaliserController extends Controller
{
    //

    public function sendToPersonnaliser(Request $request, $id)
    {

        $product = InitialProduct::find($id);
        //dd($product);
        $design = Design::all();
        $category_product = CategoryProduct::all();
        $category_design = CategoryDesign::all();
        $user = auth()->user();
        $mes_design =  Design::where('user_id', $user->id)->get();
        $favorite_designs = Auth::user()->designs;
        $favorite_products = Auth::user()->initialProducts;

        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();

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

        return view('client.personaliser', compact(
            'design',
            'category_product',
            'category_design',
            'favorite_designs',
            'favorite_products',
            'mes_design',
            'commande'
        ));
    }


    public function addDesign(Request $request)
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

    public function uploadDesign(Request  $request)
    {

        //dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);

        $id = mt_rand(100000, 999999);
        $design = new Design();
        $design->id = $id;
        $design->name = $request->name;
        $design->category_design_id = $request->category_design;
        $design->description = $request->description;
        $design->price = $request->price;
        $design->user_id = $request->user_id;
        $design->boutique_id = $request->boutique_id;

        //upload image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname .= "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath, $newname);

        $design->photo = $newname;


        // Ajouter les données du design dans le tableau JSON dans la session
        $design_data = $request->session()->get('design_data', []);
        $design_data = [
            'id' => $design->id,
            'name' => $design->name,
            'description' => $design->description,
            'photo' => $design->photo,
            'price' => $design->price,
            'user_id' => $design->user_id,
            'category_design_id' => $design->category_design_id,
        ];

        $design_data_json = json_encode($design_data);
        $request->session()->put('design_data', $design_data_json);


        if ($design->save()) {
            return redirect()->back()->with('design', $design)->with('success1', 'Votre design a été ajouté avec succès !');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }
    }


    public function sauvegarder(Request $request)
    {   
        //$mergedImage = $request->file('merged_image_data');

        $initial_product_id = $request->input('idproduit');
        $design_id = $request->input('iddesign');
        //dd($design_id);
        $initial_product = InitialProduct::find($initial_product_id);
        $design = Design::find($design_id);
        


        // Créer une instance de ProduitPersonnaliser
        $custom_product = new ProduitPersonnaliser();
        $custom_product->initial_product_id = $initial_product_id;
        $custom_product->design_id = $design_id;
        $custom_product->member_id = auth()->user()->id;
        $custom_product->name = $initial_product->name . ' ' . $design->name;
        $custom_product->description = $initial_product->description;
        if (Auth::user()->id == $design->user_id) {
            $custom_product->price = $initial_product->price + 0;
        } else {
            $custom_product->price = $initial_product->price + $design->price;
        }
        //$custom_product->price = $initial_product->price + $design->price;
        $custom_product->sizes = $initial_product->sizes;
        $custom_product->etat = $design->etat;
       

        $x =0;
        $y = 50;
        //dd($x);
        /*if ($x === null || $y === null) {
            return redirect()->back()->with('danger', 'Glisser votre design dans le rectangle du produit');
        } else {
            $x = $x;
            $y = $x;*/

        // Superposer le design sur le produit initial
        $img = ImageManagerStatic::make(public_path('uploads/' . $initial_product->photo));
        $design_img = ImageManagerStatic::make(public_path('uploads/' . $design->photo));
       // dd($design_img);
        // Charger l'image du produit initial
        //$img = Image::make(public_path('uploads/' . $initial_product->photo));

        // Charger l'image du design
        //$design_img = Image::make(public_path('uploads/' . $design->photo));

        // resize image to fixed size
        $design_img->resize(225, 225);
        
        $img->insert($design_img, 'center', $x, $y);
        //dd($img);

        // Enregistrer l'image fusionnée dans le stockage
        $img_path = 'uploads/custom_products/' . time() . '-' . Str::random(10) . '.jpg';
        $img->save(public_path($img_path));
        //$custom_product->addMedia($img_path)->toMediaCollection('custom_products');
        $custom_product->photo = $img_path; // Enregistrer le chemin de l'image dans la base de données
        //}
        
        if ($custom_product->save()) {
            // créer un tableau JSON pour les informations de produit personnalisé
            $custom_product_data = [
                'id' => $custom_product->id,
                'name' => $custom_product->name,
                'description' => $custom_product->description,
                'price' => $custom_product->price,
                'photo' => asset($custom_product->photo),
                'sizes' => $custom_product->sizes
            ];

            // stocker les données JSON dans un cookie ou dans la session
            $custom_product_data_json = json_encode($custom_product_data);
            $request->session()->put('custom_product_data', $custom_product_data_json);
            return redirect()->back()->with('success1', 'Votre produit a été sauvegardé avec succès');
        } else {
            return redirect()->back()->with('danger1', 'Une erreur s\'est produite !');
        }

        //dd($custom_product);

    }

    /* public function __invoke(Request $request)
    {
        // Check if the request method is POST.
        if ($request->method() !== 'POST') {
            // The request method is not POST.
            return response()->json(['error' => 'Invalid request method.'], 400);
        }
        // dd($request->hasFile('image') );
        // Check if the image was uploaded successfully.
        if (! $request->hasFile('image')  || ! $request->file('image')->isValid()) {
            // The image was not uploaded successfully.
            return response()->json(['error' => 'An error occurred while uploading the image.'], 500);
        }

        // Move the image to the upload directory.
        $path = $request->file('image')->store('uploads');

        // Display a success message.
        return response()->json(['success' => true, 'path' => $path]);
    }*/


    /*public function sauvegarder(Request $request)
    {   //dd($request);
        $image = $request->input('image-clone-position');
       //dd($image);
        $initial_product_id = $request->input('idproduit');
        $design_id = $request->input('iddesign');
        //dd($design_id);
        $initial_product = InitialProduct::find($initial_product_id);
        $design = Design::find($design_id);


        // Créer une instance de ProduitPersonnaliser
        $custom_product = new ProduitPersonnaliser();
        $custom_product->initial_product_id = $initial_product_id;
        $custom_product->design_id = $design_id;
        $custom_product->member_id = auth()->user()->id;
        $custom_product->name = $initial_product->name . ' ' . $design->name;
        $custom_product->description = $initial_product->description;
        if (Auth::user()->id == $design->user_id) {
            $custom_product->price = $initial_product->price + 0;
        } else {
            $custom_product->price = $initial_product->price + $design->price;
        }
        //$custom_product->price = $initial_product->price + $design->price;
        $custom_product->sizes = $initial_product->sizes;
        $custom_product->etat = $design->etat;

         //upload image
         $newname = uniqid();
         $image = $request->file('photo');
         $newname.= "." . $image->getClientOriginalExtension();
         $destinationPath = 'uploads/custom_products/';
         $image->move($destinationPath , $newname);
 
         $custom_product->photo = $newname;
 

            // Enregistrer l'image fusionnée dans le stockage
            // $img_path = 'uploads/custom_products/' . time() . '-' . Str::random(10) . '.jpg';
            // $img->save(public_path($img_path));
            // //$custom_product->addMedia($img_path)->toMediaCollection('custom_products');
            // $custom_product->photo = $img_path; // Enregistrer le chemin de l'image dans la base de données
        

        if ($custom_product->save()) {
            // créer un tableau JSON pour les informations de produit personnalisé
            $custom_product_data = [
                'id' => $custom_product->id,
                'name' => $custom_product->name,
                'description' => $custom_product->description,
                'price' => $custom_product->price,
                'photo' => asset($custom_product->photo),
                'sizes' => $custom_product->sizes
            ];

            // stocker les données JSON dans un cookie ou dans la session
            $custom_product_data_json = json_encode($custom_product_data);
            $request->session()->put('custom_product_data', $custom_product_data_json);
            return redirect()->back()->with('success', 'Votre produit a été sauvegardé avec succès');
        } else {
            return redirect()->back()->with('danger', 'dfrsvsdfvs');
        }

        //dd($custom_product);

    }*/

    public function index()
    {
        $user = auth()->user();
        $produits_personnaliser =  ProduitPersonnaliser::where('member_id', $user->id)->latest()->paginate(4);
        return view('client.produit_personnaliser.index', compact('produits_personnaliser'));
    }

    public function addToCart(Request $request)
    {   //dd($request);
        $commande = Commande::where('member_id', Auth::user()->id)->where('etat', 'en cours')->first();
        //dd($request);
        // Vérification de l'existence de la commande
        if ($commande) {
            $existe = false;
            foreach ($commande->lignecommandes as $lignec) {
                if ($lignec->custom_product_id == $request->custom_product_id && $lignec->selected_size == $request->selected_size) {
                    $existe = true;
                    if ($request->qte) {
                        $lignec->qte += $request->qte;
                    } else {
                        return redirect()->back()->with('danger1', 'La quantité est nulle.');
                    }
                    $lignec->update();
                }
            }

            if (!$existe) {
                // Création de la ligne de commande
                $lc = new LigneCommande();
                if ($request->qte) {
                    $lc->qte = $request->qte;
                } else {
                    return redirect()->back()->with('danger1', 'La quantité est nulle.');
                }

                // Vérification de la sélection de la taille si le produit personnalisé a des tailles
                $customProduct = ProduitPersonnaliser::find($request->custom_product_id);
                if ($customProduct->sizes !== "[]" && $request->selected_size === null) {
                    return redirect()->back()->with('danger1', 'Veuillez sélectionner une taille.');
                }

                $lc->custom_product_id = $request->custom_product_id;
                $lc->selected_size = $request->input('selected_size');
                $lc->commande_id = $commande->id;
                $lc->save();
            }
            return redirect()->back()->with('success1', 'Le produit est ajouter au panier');
        } else {
            $commande = new Commande();
            $commande->member_id = Auth::user()->id;
            if ($commande->save()) {
                // Création de la ligne de commande
                $lc = new LigneCommande();
                if ($request->qte) {
                    $lc->qte = $request->qte;
                } else {
                    return redirect()->back()->with('danger1', 'La quantité est nulle.');
                }

                // Vérification de la sélection de la taille si le produit personnalisé a des tailles
                $customProduct = ProduitPersonnaliser::find($request->custom_product_id);
                if ($customProduct->sizes !== "[]" && $request->selected_size === null) {
                    return redirect()->back()->with('danger1', 'Veuillez sélectionner une taille.');
                }

                $lc->custom_product_id = $request->custom_product_id;
                $lc->selected_size = $request->input('selected_size');
                $lc->commande_id = $commande->id;
                $lc->save();
                return redirect()->back()->with('success1', 'Le produit est ajouter au panier');
            } else {
                return redirect()->back()->with('danger1', 'Impossible de commander le produit');
            }
        }
    }
}
