<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('directions')->insert([
           [
               'abr'=>'SG',
               'libelle'=>'SECRETAIRE GENERALE',
           ],
           [
            'abr'=>'DGETP',
            'libelle'=>'Direction Générale de l Enseignement Technique et Professionnel',
           ],
           [
            'abr'=>'DG',
            'libelle'=>'Direction Générale de la Formation Professionnelle',
           ],
           [
            'abr'=>'DCAQ',
            'libelle'=>'Direction des Curricula et de l Assurance Qualité  ',
           ],
           [
            'abr'=>'DIP',
            'libelle'=>'Direction de l Ingénierie Pédagogique',
           ],
           [
            'abr'=>'DETP',
            'libelle'=>'Direction de lEnseignement Technique et Professionnel',
           ],
           [
            'abr'=>'DEXAM',
            'libelle'=>'Direction des Examents',
           ],
           [
            'abr'=>'DERCP',
            'libelle'=>'Direction des Études et Recherches sur les Compétentes Professionnelle',
           ],
           [
            'abr'=>'DIFP',
            'libelle'=>'Direction de l Ingénierie de la Formation Professionnelle',
           ],
           [
            'abr'=>'DFPQ',
            'libelle'=>'Direction de la Formation Professionnelle Qualifiante',
           ],
           [
            'abr'=>'DAMB',
            'libelle'=>'Direction de l Apprentissage des Métiers de Base',
           ],
           [
            'abr'=>'CNFAR',
            'libelle'=>'Centre National de Formation professionnelle Agricole et Rurale',
           ],
           [
            'abr'=>'INPF',
            'libelle'=>'Institut National de Promotion de Formation',
           ],
           [
            'abr'=>'CNFPPSH',
            'libelle'=>'Centre National de Formation Professionnelle Personnes en Situation de Handicap',
           ],
           [
            'abr'=>'DAF',
            'libelle'=>'Direction de Affaire Financières',
           ],
           [
            'abr'=>'DPL',
            'libelle'=>'Direction du Patrimoine et de la Logistique',
           ],
           [
            'abr'=>'DRH',
            'libelle'=>'Direction des Ressources Humaines',
           ],
           [
            'abr'=>'DIDN',
            'libelle'=>'Direction Innovation et de Developpement numerique',
           ],
           [
            'abr'=>'CGPP',
            'libelle'=>'Coordonnateur General des Programmes et des Projets',
           ],
           [
            'abr'=>'DPSSE',
            'libelle'=>'Direction de Planification et Suivi Valuation',
           ],
           [
            'abr'=>'CGPP',
            'libelle'=>'Coordinnation Général des Programme et Des Projets ',
           ],
           [
            'abr'=>'DPSE',
            'libelle'=>'Direction de Planification et Suivi Valuation ',
           ],
           [
            'abr'=>'PRMP',
            'libelle'=>'Personne Responsable des Marchés Public',
           ],
           [
            'abr'=>'UCAI',
            'libelle'=>'Unité de contrôle Interne',
           ],
           [
            'abr'=>'',
            'libelle'=>'Cabinet',
           ],
           [
            'abr'=>'DRETPF',
            'libelle'=>'Directions Régionales de l’Enseignement Technique et de la Formation Professionnelle',
           ],

       ]);

    }
}

