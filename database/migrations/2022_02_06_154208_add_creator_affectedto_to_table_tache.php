<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatorAffectedtoToTableTache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->bigInteger('creator_id')->default(0)->after('done');
            $table->bigInteger('affectedTo_id')->default(0)->after('creator_id');
            $table->bigInteger('affectedBy_id')->default(0)->after('affectedTo_id');
            $table->string('collaborateur')->nullable()->after('affectedBy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_taches', function (Blueprint $table) {
            $table->dropColumn('creator_id');
            $table->dropColumn('affectedTo_id');
            $table->dropColumn('affectedBy_id');
        });
    }
}
