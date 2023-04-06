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
            $table->unsignedBigInteger('design_id');
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
            $table->unsignedBigInteger('initial_product_id');
            $table->foreign('initial_product_id')->references('id')->on('initial_products')->onDelete('cascade');
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
