<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaterielBonSortieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materiel_bon_sorties')->insert([

            [ 'materiel'=>'Ecran',],
            [ 'materiel'=>'Ordinateur Portable',],
            [ 'materiel'=>'Imprimante',],
            [ 'materiel'=>'Onduleur',],
            [ 'materiel'=>'Stabilisateur',],
            [ 'materiel'=>'Switch',],
            [ 'materiel'=>'Bafle',],
            [ 'materiel'=>'Amplificateur',],
         ]);
    }
}
