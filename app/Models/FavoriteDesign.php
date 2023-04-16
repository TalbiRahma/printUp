<?php

namespace App\Models;

use App\Models\User;
use App\Models\Design;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavoriteDesign extends Model
{
    use HasFactory;
 
    public function member()
    {
        return $this->belongsTo(User::class ,'user_id' , 'id' );
    }
    public function designs()
    {
        return $this->belongsTo(Design::class ,'design_id' , 'id' );
    }
}
