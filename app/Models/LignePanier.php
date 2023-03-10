<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePanier extends Model
{
    use HasFactory;

    public function produitPersonnaliser()
    {
        return $this->belongsTo(ProduitPersonnaliser::class , 'ligne_panier_id' , 'id');
    }

    public function panier()
    {
        return $this->belongsTo(Panier::class , 'panier_id' , 'id');
    }
}
