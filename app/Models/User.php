<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cin',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function boutique()
    {
        return $this->hasOne(Boutique::class , 'boutique_id' , 'id');
    }


    public function portmonnaie()
    {
        return $this->hasOne(Portmonnaie::class , 'portmonnaie_id' , 'id');
    }

    public function paniers()
    {
        return $this->hasMany(Panier::class , 'user_id' , 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class , 'user_id' , 'id');
    }

    public function initialProducts()
    {
        return $this->belongsToMany(InitialProduct::class, 'favorite_product', 'user_id', 'initial_product_id');
    }

    public function designs()
    {
        return $this->belongsToMany(Design::class, 'favorite_design', 'user_id', 'design_id');
    }
}
