<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reference_contrat');
            $table->string('ref_produit_contrat');
            $table->string('reference');
            $table->string('nom_commercial');
            $table->string('etat');
            $table->string('etat_service');
            $table->timestamps();

            $table->foreign('reference_contrat')->references('reference_contrat')->on('contract')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
