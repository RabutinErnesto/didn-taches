<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solutions')->insert([
            [ 'solution'=>'Reinstallation systeme',],
            [ 'solution'=>'Traitement virus',],
            [ 'solution'=>'recuperation donnees',],
            [ 'solution'=>'Configuration (reseau, imprimante)',],
            [ 'solution'=>'Reparation',],
            [ 'solution'=>'Nettoyage',],
            [ 'solution'=>'Restauration',],
         ]);
    }
}

