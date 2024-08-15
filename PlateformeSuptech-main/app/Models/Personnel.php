<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $fillable = ['id_personnel',
        'nom', 'prenom', 'CIN', 'matricule_cnss', 'mail', 'etablissement',
        'RIB', 'RIB_pdf', 'type_contrat', 'contrat_pdf', 'cv_pdf', 'cin_pdf','est_prof','est_salarie'
    ];

    public $timestamps = false;

    public function lieu()
    {
        return $this->belongsToMany(LieuAffectation::class, 'lieu_personnel', 'id_personnel', 'id_lieu');
    }
}
