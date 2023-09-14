<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RabutinExporteurBon implements FromCollection, WithHeadings, WithMapping
{
    protected $data;

    public function __construct($data, $resultat)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date Sortie',
            'Nom Preteur',
            'Nom Emprunteur',
            'Matériel',
            'Utilisation',
            'Date Arrivée',
            'Observation',
        ];
    }

    public function map($bonsortie): array
    {
        return [
            $bonsortie->id,
            $bonsortie->date_sortie,
            $bonsortie->date_preteur,
            $bonsortie->date_emprunteur,
            $bonsortie->materiel,
            $bonsortie->utilisation,
            $bonsortie->date_arrivee,
            $bonsortie->observation,
        ];
    }


}

