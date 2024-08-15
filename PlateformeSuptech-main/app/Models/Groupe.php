<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public function seance()
    {
        return $this->hasMany(Seance::class, 'id_groupe');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }

    
    protected $table = 'groupe';

public $incrementing = false;

public $timestamps = false;
 protected $fillable = [
       
       
       'id_groupe',
       'intitule',
      
       'id_filiere',
         
          
      ];
}