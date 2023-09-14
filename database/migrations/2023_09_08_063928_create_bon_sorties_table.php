<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_sorties', function (Blueprint $table) {
            $table->id();
            $table->string('date_sortie')->nullable();
            $table->string('date_arrivee')->nullable();
            $table->string('nom_preteur')->nullable();
            $table->string('nom_emprunteur')->nullable();
            $table->bigInteger('direction_id')->nullable();
            $table->bigInteger('service_id')->nullable();
            $table->string('fonction_emprunteur')->nullable();
            $table->string('contact_emprunteur')->nullable();
            $table->string('materiel')->nullable();
            $table->string('utilisation')->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('bon_sorties');
    }
}
