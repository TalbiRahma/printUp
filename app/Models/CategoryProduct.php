<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    public function initial_products()
    {
        return $this->hasMany(InitialProduct::class , 'category_product_id' , 'id');
    }
}
