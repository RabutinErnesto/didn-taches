<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RabutinExporteurTaches implements FromCollection, WithHeadings, WithMapping
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
            'Maintenance',
            'Taches',
            'Status',
            'Affecter par',
            'Affecter a',
            'Description',
        ];
    }

    public function map($tache): array
    {
        $maintenanceName = $tache->maintenance ? $tache->maintenance->titre : 'Autres';
        $affect = $tache->tacheAffectedTo ? $tache->tacheAffectedTo->name : '';
        $affectpa = $tache->tacheAffectedBy ? $tache->tacheAffectedBy->name : '';
        $tacheStatus = $tache->done ? 'Terminé' : 'Non Terminé';
        return [
            $tache->id,
            $maintenanceName,
            $tache->tache,
            $tacheStatus,
            $affectpa,
            $affect,
            $tache->description,
        ];
    }


}

