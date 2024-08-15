<?php

namespace App\Imports;

use App\Models\Etudians;
use App\Models\Note;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtudiantsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $etudiant = Etudians::updateOrCreate(
            ['Apogee' => $row['apogee']],
            [
                'CNE' => $row['cne'],
                'CNI' => $row['cni'],
                'Nom' => $row['nom'],
                'Prenom' => $row['prenom']
            ]
        );

        Note::updateOrCreate(
            ['apogee' => $etudiant->apogee],
            [
                'CTR1' => $row['ctr1'],
                'CTR2' => $row['ctr2'],
                'EF' => $row['ef'],
                'TP' => $row['tp']
            ]
        );

        return $etudiant;
    }
}
