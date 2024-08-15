<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bourse extends Model
{
    protected $table = 'bourse';
    protected $primaryKey = 'id_bourse';
    use HasFactory;
    protected $fillable = [
       
       
        'id_bourse',
        'taux_bourse',
        
          
           
       ];
       public function etudiants()
       {
           return $this->belongsToMany(Etudians::class, 'etudient_bourse', 'id_bourse', 'apogee');
       }
}
