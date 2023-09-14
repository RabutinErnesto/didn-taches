<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTaches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('maintenance_id')->nullable();
            $table->string('tache')->nullable();
            $table->string('tache_faire')->nullable();
            $table->text('observation')->nullable();
            $table->string('nom_proprietaire')->nullable();
            $table->bigInteger('direction_id')->nullable();
            $table->bigInteger('service_id')->nullable();
            $table->string('fonction_proprietaire')->nullable();
            $table->string('contact_proprietaire')->nullable();
            $table->string('batiment')->nullable();
            $table->string('porte')->nullable();
            $table->boolean('done');
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
        Schema::dropIfExists('table_tache');
    }
}
