<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $table = 'enseignant';
    
    public function Absence_accueil()
    {
        return $this->hasMany(Absence_Accueil::class, 'cin_salarie');
    }
}
