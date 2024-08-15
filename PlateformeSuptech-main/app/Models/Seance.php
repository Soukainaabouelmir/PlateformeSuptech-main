<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seance extends Model
{
    // Dans le modèle Seance
    public function element()
    {
        return $this->belongsTo(Element::class, 'num_element','num_element');
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_groupe','id_groupe');
    }

// Dans le modèle Groupe




    protected $table = 'seance';
    public $timestamps = false;
    protected $fillable = [
       
       
     'num_seance',
     'date_seance',
     'heure_depart',
     'objectif',
     'heure_fin',
        'num_element',
        'id_groupe',
        
    ];

}