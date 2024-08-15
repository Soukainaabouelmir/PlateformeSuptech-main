<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur_Etudiant extends Model
{
    protected $table = 'tuteur_etudiant';
    use HasFactory;
   
    protected $primaryKey = ['apogee', 'id_tuteur'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'apogee', 'id_tuteur'
    ];
    public function etudiant()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }

    public function tuteur()
    {
        return $this->belongsTo(Tuteur::class, 'id_tuteur', 'id_tuteur');
    }
}
