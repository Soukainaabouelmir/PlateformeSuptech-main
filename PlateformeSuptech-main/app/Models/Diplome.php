<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    protected $table = 'diplome';
    public $timestamps = false;
    protected $fillable = [
        'id_diplome',
      
        'diplome',
        
    ];
    protected $primaryKey = 'id_diplome';
    use HasFactory;
    public function etudiants()
    {
        return $this->belongsToMany(Etudians::class, 'diplome_etudiant', 'id_diplome', 'apogee')
                    ->withPivot('mention');
    }
}
