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
        Schema::create('ligne_paniers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ligne_panier_id');
            $table->foreign('ligne_panier_id')->references('id')->on('ligne_paniers')->onDelete('cascade');
            $table->unsignedBigInteger('panier_id');
            $table->foreign('panier_id')->references('id')->on('paniers')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_paniers');
    }
};
