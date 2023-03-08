<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class , 'boutique_id' , 'id');
    }

    public function designs()
    {
        return $this->hasMany(Design::class , 'boutique_id' , 'id');
    }
}
