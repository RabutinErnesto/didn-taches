<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materiels')->insert([
            [ 'materiel'=>'UC',],
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
