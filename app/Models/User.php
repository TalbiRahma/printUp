<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ReviwDesign;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->hasOne(Portmonnaie::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'member_id', 'id');
    }

    public function getTotaltransactions()
    {

        $total = 0;
        // liste des lignes de commande
        foreach ($this->transactions as $tr) {
            if ($tr->type === 'remboursé') {
                $total += $tr->montant;
            }
        }
        return $total;
    }

    public function produits_personnalises()
    {
        return $this->hasMany(ProduitPersonnaliser::class, 'membre_id', 'id');
    }

    public function boutique()
    {
        return $this->hasOne(Boutique::class, 'user_id', 'id');
    }

    public function boutiques()
    {
        return $this->belongsToMany(Boutique::class, 'suivis', 'member_id', 'boutique_id');
    }

    public function nbrDesign()
    {

        $nbr = 0;
        //liste des lignes de commande
        foreach ($this->designs as $design) {
            $nbr += 1;
        }
        return $nbr;
    }

    public function nbrSuivis()
    {

        $nbr = 0;
        //liste des lignes de commande
        foreach ($this->boutiques as $boutique) {
            $nbr += 1;
        }
        return $nbr;
    }

    public function reviewdesigns()
    {
        return $this->hasMany(ReviwDesign::class, 'user_id', 'id');
    }
}
