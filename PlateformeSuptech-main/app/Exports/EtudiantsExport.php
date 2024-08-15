<?php

namespace App\Exports;

use App\Models\Etudians;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EtudiantsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Etudians::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Apogee',
            'CNE',
            'CNI',
            'Nom',
            'Prenom',
            'CTR1',
            'CTR2',
            'EF',
            'TP',
        ];
    }
}
