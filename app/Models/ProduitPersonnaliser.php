<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitPersonnaliser extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    
    public function initialProduct()
    {
        return $this->belongsTo(InitialProduct::class, 'initial_product_id', 'id');
    }

    public function design()
    {
        return $this->belongsTo(Design::class, 'design_id', 'id');
    }

    public function ligneCommande(){
        return $this->hasMany(LigneCommande::class, 'custom_product_id', 'id');
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class, 'membre_id', 'id');
    }
}
