<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
   
    public $timestamps = false;

   
    protected $table = 'tuteur';
    protected $primaryKey = 'id_tuteur';
    use HasFactory;
    public function etudiants()
    {
        return $this->belongsToMany(Etudians::class, 'tuteur_etudiant', 'id_tuteur', 'apogee');
    }
    protected $fillable = ['nom', 'cin', 'tel1', 'tel2', 'profession', 'adresse', 'code_postal', 'email'];

}
