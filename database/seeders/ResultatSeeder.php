<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resultats')->insert([
            [ 'resultat'=>'Réparé',],
            [ 'resultat'=>'Non Réparé',],
            [ 'resultat'=>'En attente pièce',],
         ]);
    }
}

