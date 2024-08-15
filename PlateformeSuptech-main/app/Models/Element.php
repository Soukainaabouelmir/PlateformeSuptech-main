<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'element';

    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
       
       
        'id_element',
        'intitule',
        'descriprion',
        'nbr_heure_cours',
        'num_module',
          
           
       ];
       public function seance()
    {
        return $this->hasMany(Seance::class, 'num_element',);
    }
    public function notes_evaluation()
    {
        return $this->hasMany(Note::class, 'num_element',);
    }
    public function module()
    {
        return $this->hasMany(Module::class, 'id_element',);
    }
    public function programmeEvaluations()
    {
        return $this->hasMany(Programme_Evaluation::class, 'id_element');
    }
    public function Absence_accueil()
    {
        return $this->hasMany(Absence_Accueil::class, 'num_element');
    }
}