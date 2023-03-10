<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitPersonnaliser extends Model
{
    use HasFactory;

    public function initialProduct()
    {
        return $this->belongsTo(InitialProduct::class ,'initial_product_id' , 'id' );
    }

    public function design()
    {
        return $this->belongsTo(Design::class , 'design_id' , 'id');
    }

    public function lignePaniers()
    {
        return $this->hasMany(LignePanier::class , 'ligne_panier_id' , 'id');
    }
}
