<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome_etudiant extends Model
{
    use HasFactory;
    protected $table = 'diplome_etudiant';
    public $timestamps = false;
    protected $fillable = [
        'id_diplome',
      
        'apogee',
        'mention',
        'Annee_bac',
        
        
    ];
    public function etudiant()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }

    public function Diplome()
    {
        return $this->belongsTo(Diplome::class, 'id_diplome', 'id_diplome');
    }
}
