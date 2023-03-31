<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->string('semaine')->nullable();
            $table->string('service')->nullable();
            $table->string('intitule_activite')->nullable();
            $table->string('status')->nullable();
            $table->longText('description')->nullable();
            $table->longText('observation')->nullable();
            $table->string('semaine2')->nullable();
            $table->string('service2')->nullable();
            $table->string('intitule_activite2')->nullable();
            $table->string('deadline')->nullable();
            $table->longText('description2')->nullable();
            $table->longText('observation2')->nullable();
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
        Schema::dropIfExists('activites');
    }
}
