<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_personnalisers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('initial_product_id');
            $table->foreign('initial_product_id')->references('id')->on('intial_products')->onDelete('cascade');
            $table->unsignedBigInteger('design_id');
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
            $table->unsignedBigInteger('ligne_panier_id');
            $table->foreign('ligne_panier_id')->references('id')->on('ligne_paniers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_personnalisers');
    }
};
