<?php

namespace App\Models;

use Illuminate\Console\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo(Commande::class , 'panier_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function lignePaniers()
    {
        return $this->hasMany(LignePanier::class , 'panier_id' , 'id');
    }
}
