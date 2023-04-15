<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function lignecommandes()
    {
        return $this->hasMany(LigneCommande::class , 'commande_id' , 'id');
    }

    public function member(){
        return $this->belongsTo(User::class , 'member_id' , 'id');
     }

    public function getTotal(){

        $total = 0;
        //liste des lignes de commande
        foreach($this->lignecommandes as $lc){
           $total += $lc->customproduct->price * $lc->qte;
        }
        return $total;
    }
}
