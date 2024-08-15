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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();   // $table->text('Code_Apogee');
            $table->Text('mois_concerne');
            $table->Text('nom');
            $table->Text('prenom');
            $table->Text('filiere');
            $table->Text('cni');
            $table->Text('n_telephone');
            $table->Text('montant');
            $table->Text('choix');
            $table->Text('mode_paiement');
            $table->string('image')->nullable();
            $table->timestamps();
              // $table->foreign('Code_Apogee')->references('Code_Apogee')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};
