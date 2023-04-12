<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    public function produitsPersonnalises()
    {
        return $this->belongsToMany(ProduitPersonnaliser::class, 'produit_personnalisers', 'boutique_id', 'produit_personnaliser_id');
    }





    
    public function user()
    {
        return $this->belongsTo(User::class, 'boutique_id', 'id');
    }

    public function designs()
    {
        return $this->hasMany(Design::class, 'boutique_id', 'id');
    }
}
