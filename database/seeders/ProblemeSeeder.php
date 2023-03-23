<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problemes')->insert([
            [ 'probleme'=>'Logiciels',],
            [ 'probleme'=>'Materiels',],
         ]);
    }
}

