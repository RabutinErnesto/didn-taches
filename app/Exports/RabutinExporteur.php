<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RabutinExporteur implements WithMultipleSheets
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $groupedData = $this->data->groupBy('resultat');
        $sheets = [];

        foreach ($groupedData as $resultat => $data) {
            $sheets[] = new FicheSheet($data, $resultat);
        }

        return $sheets;
    }
}
