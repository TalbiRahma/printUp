<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    use HasFactory;
    public function initialProduct()
    {
        return $this->belongsTo(InitialProduct::class ,'initial_product_id' , 'id' );
    }

    public function member()
    {
        return $this->belongsTo(User::class ,'user_id' , 'id' );
    }
    public function initialProducts()
    {
        return $this->belongsTo(InitialProduct::class ,'initial_product_id' , 'id' );
    }
}
