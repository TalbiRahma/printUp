<?php

namespace App\Models;

use App\Models\Boutique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    use HasFactory;

    public function categorie_designs()
    {
        return $this->belongsTo(CategoryDesign::class, 'category_design_id', 'id');
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class, 'boutique_id', 'id');
    }

    public function initialProducts()
    {
        return $this->belongsToMany(InitialProduct::class, 'produit_personnalisers', 'design_id', 'initial_product_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'favorite_designs', 'user_id', 'design_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nbrDesign()
    {
        
    }
}
