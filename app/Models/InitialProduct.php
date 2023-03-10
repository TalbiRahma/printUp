<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialProduct extends Model
{
    use HasFactory;

    public function categorie_products()
    {
        return $this->belongsTo(CategoryProduct::class , 'category_product_id' , 'id');
    }

    public function designs()
    {
        return $this->belongsToMany(Design::class, 'produit_personnaliser', 'initial_product_id', 'design_id');
    }

    
}
