<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heure_Fin extends Model
{
    use HasFactory;
    protected $table = 'heure_fin';

   
    protected $fillable = [
       
       
        'id_heure_fin',
        
        'heure_fin',
          
           
       ];
      
   
    public function Assurer_Cours()
    {
        return $this->hasMany(Assurer_Cours::class, 'id_heure_fin',);
    }
}
