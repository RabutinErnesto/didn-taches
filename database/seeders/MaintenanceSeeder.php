<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintenaces')->insert([
            [ 'titre'=>'Maintenance reseaux',],
            [ 'titre'=>'Maintenance informatique',],
            [ 'titre'=>'Maintenance electronique',],
         ]);
    }
}

