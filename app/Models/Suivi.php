<?php

namespace App\Models;

use App\Models\User;
use App\Models\Boutique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suivi extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(User::class ,'member_id' , 'id' );
    }
    public function boutiques()
    {
        return $this->belongsTo(Boutique::class ,'boutique_id' , 'id' );
    }
}
