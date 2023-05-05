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



    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function initialProducts()
    {
        return $this->belongsToMany(InitialProduct::class, 'favorite_products', 'user_id', 'initial_product_id');
    }

    public function designs()
    {
        return $this->belongsToMany(Design::class, 'favorite_designs', 'user_id', 'design_id');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'member_id', 'id');
    }

  
    public function portmonnaie()
    {
        return $this->hasOne(Portmonnaie::class, 'user_id' , 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class , 'member_id', 'id');
    }

    public function getTotaltransactions(){

        $total = 0;
        //liste des lignes de commande
        foreach($this->transactions as $tr){
           $total += $tr->montant_transferts;
        }
        return $total;
    }

    public function produits_personnalises()
    {
        return $this->hasMany(ProduitPersonnaliser::class, 'membre_id', 'id');
    }
}
