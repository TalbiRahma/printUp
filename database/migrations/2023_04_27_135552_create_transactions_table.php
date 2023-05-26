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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->float('montant')->default(0);
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('type', ['demande', 'remboursé', 'revenu'])->default('demande');
            $table->enum('etat', ['null','0', '1'])->default('null');
            $table->timestamps();
            /*/*$table->float('montant_demander')->nullable();
=======
            
            $table->float('montant_demander')->nullable();
>>>>>>> e75945e7b609f7117a529fef5acedf2283e2edd3
            $table->float('montant_transferts')->default(0)->nullable();
            $table->float('solde')->default(0)->nullable();
            $table->enum('etat', ['demandee', 'transferee'])->default('demandee');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            /*$table->id();
            $table->float('montant_demander')->nullable();
            $table->float('montant_transferts')->default(0)->nullable();
            $table->float('solde ')->default(0)->nullable();
            $table->enum('etat', ['demandee', 'transferee'])->default('demandee');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
