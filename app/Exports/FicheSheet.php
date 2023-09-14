<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FicheSheet implements FromCollection, WithHeadings, WithMapping
{
    protected $data;
    protected $resultat;

    public function __construct($data, $resultat)
    {
        $this->data = $data;
        $this->resultat = $resultat;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date Arrivée',
            'Nom Propriétaire',
            'Nom Intervenant',
            'Matériel',
            'Résultat',
            'Date Sortie',
        ];
    }

    public function map($fiche): array
    {
        return [
            $fiche->id,
            $fiche->date_arrivee,
            $fiche->nom_proprietaire,
            $fiche->nom_intervenant,
            $fiche->materiel,
            $fiche->resultat,
            $fiche->date_sortie,
        ];
    }


}

