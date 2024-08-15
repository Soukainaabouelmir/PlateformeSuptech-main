<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heure_Debut extends Model
{
    protected $table = 'heure_debut';

   
    protected $fillable = [
       
       
        'id_heure_debut',
        
        'heure_debut',
          
           
       ];
      
    use HasFactory;
    public function Assurer_Cours()
    {
        return $this->hasMany(Assurer_Cours::class, 'id_heure_debut',);
    }
}
