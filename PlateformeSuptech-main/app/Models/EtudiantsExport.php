<?php
// EtudiantsExport.php
namespace App\Exports;

use App\Models\Etudians;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtudiantsExport implements FromCollection
{
    public function collection()
    {
        return Etudians::all();
    }
}
