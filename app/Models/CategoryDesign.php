<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDesign extends Model
{
    use HasFactory;

    public function designs()
    {
        return $this->hasMany(Design::class , 'category_design_id' , 'id');
    }

}
