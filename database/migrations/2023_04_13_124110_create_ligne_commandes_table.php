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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('qte');
            $table->string('selected_size')->nullable();
            $table->unsignedBigInteger('custom_product_id')->nullable();
            $table->foreign('custom_product_id')->references('id')->on('produit_personnalisers')->onDelete('cascade');
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_commandes');
    }
};
