<?php

namespace App\Models;

use App\Models\User;
use App\Models\Design;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviwDesign extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id'  );
    }

    public function design(){
        return $this->belongsTo(Design::class , 'design_id', 'id');
    }
}
