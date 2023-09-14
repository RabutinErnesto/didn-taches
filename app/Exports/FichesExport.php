<?php

namespace App\Exports;

use App\Fiches;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FichesExport implements FromCollection, WithHeadings
{
        public function collection()
        {
            return Fiches::select('id', 'date_arrivee', 'nom_proprietaire', 'nom_intervenant', 'materiel', 'resultat', 'date_sortie')->get();
        }


    public function headings(): array
    {
        return [
            'ID',
            'Date Arrivée',
            'Nom Propriétaire',
            // 'Direction',
            'Nom Intervenant',
            'Matériel',
            // 'Autres Matériels',
            // 'Problème Constâté',
            // 'Problèmes',
            // 'Solutions',
            // 'Interventions',
            'Résultat',
            // 'Motifs et Remarques',
            // 'Recommandation',
            'Date Sortie',
            // 'Utilisateur Créé',
        ];
    }
}
