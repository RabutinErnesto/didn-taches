<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->string('date_arrivee')->nullable();
            $table->string('nom_proprietaire')->nullable();
            $table->bigInteger('direction_id')->nullable();
            $table->bigInteger('service_id')->nullable();
            $table->string('fonction_proprietaire')->nullable();
            $table->string('contact_proprietaire')->nullable();
            $table->string('nom_intervenant')->nullable();
            $table->string('materiel')->nullable();
            $table->string('marque')->nullable();
            $table->string('ram')->nullable();
            $table->string('disque_dur')->nullable();
            $table->string('proc')->nullable();
            $table->string('carte_mere')->nullable();
            $table->string('couleur')->nullable();
            $table->string('encre')->nullable();
            $table->string('type')->nullable();
            $table->string('autres_materiel')->nullable();
            $table->string('probleme_constate')->nullable();
            $table->string('problemes')->nullable();
            $table->string('solutions')->nullable();
            $table->string('interventions')->nullable();
            $table->string('resultat')->nullable();
            $table->string('motifs_et_remarques')->nullable();
            $table->string('recommandation')->nullable();
            $table->string('date_sortie')->nullable();
            $table->integer('user_created');
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
        Schema::dropIfExists('fiches');
    }
}
