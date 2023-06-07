<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialProduct extends Model
{
    use HasFactory;

    public function categorie_products()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id', 'id');
    }

    public function designs()
    {
        return $this->belongsToMany(Design::class, 'produit_personnalisers', 'initial_product_id', 'design_id');
    }

    /**
     * Get all of the comments for the InitialProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'initial_product_id', 'id');
    }

    public function moyReviews()
    {
        $nbr = 0;
        //liste des lignes de commande
        foreach ($this->reviews as $rev) {
            $nbr += 1;
        }

        $sum = 0;
        //liste des lignes de commande
        foreach ($this->reviews as $rev) {
            $sum += $rev->rate;
        }

        if ( $nbr == 0){
            $nbr = 1;
            $moy = $sum / $nbr;
        }else{
            $moy = $sum / $nbr;
        }

        return $moy;
    }
    ////////////
    public function members()
    {
        return $this->belongsToMany(User::class, 'favorite_products', 'user_id', 'initial_product_id');
    }
}
