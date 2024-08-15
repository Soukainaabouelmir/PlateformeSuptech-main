<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurer_Cours extends Model
{
    protected $table = 'assurer_cours';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
       
       
        'id_element',
        'id_date',
        'id_prof',
        'id_salle',
        'N_Groupe',
        'id_heure_fin',
        'id_heure_debut',
          
           
       ];
       public function professeur()
    {
        return $this->belongsTo(Personnel::class, 'id_prof', 'id_personnel');
    }
    public function element()
    {
        return $this->belongsTo(Element::class, 'id_element', 'id_element');
    }
    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle', 'id_salle');
    }
    public function date()
    {
        return $this->belongsTo(Date::class, 'id_date', 'id_date');
    }
    public function heureFin()
    {
        return $this->belongsTo(Heure_Fin::class, 'id_heure_fin');
    }
    public function heureDebut()
    {
        return $this->belongsTo(Heure_Debut::class, 'id_heure_debut');
    }
    public function prof()
    {
        return $this->belongsTo(Enseignant::class, 'id_prof', 'id_prof');
    }
}
