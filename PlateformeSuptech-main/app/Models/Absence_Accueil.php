<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence_Accueil extends Model
{
    protected $table = 'absence_accueil';
    public $timestamps = false;
    protected $fillable = [
       
       
        'num_element',
        'heure_depart',
        'heure_fin',
        'date_seance',
        'cin_salarie',
          
           
       ];
    public function etablissement()
    {
        return $this->belongsTo(Element::class, 'num_element', 'num_element');
    }
    public function Enseignat()
    {
        return $this->belongsTo(Enseignant::class, 'cin_salarie');
    }

}
