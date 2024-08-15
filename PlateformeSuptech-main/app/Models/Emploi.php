<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    protected $table = 'emploi';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_semestre','code_postal', 'id_filiere', 'emploi_pdf'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_groupe');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'code_postal');
    }
    public function Semestre()
    {
        return $this->belongsTo(semestre::class, 'id_semestre');
    }
}
