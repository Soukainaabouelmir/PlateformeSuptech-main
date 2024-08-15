<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{

 
    

    protected $table = 'etablissement';
    protected $fillable = [
        'ville',
        'code_postal',
        ];
    protected $primaryKey = 'code_postal';
    public $incrementing = false;

    public $timestamps = false;
    
    public function etudiants()
    {
        return $this->hasMany(Etudians::class, 'code_postal', 'code_postal');
    }
    public function programme()
    {
        return $this->hasMany(Programme_Evaluation::class, 'code_postal', 'code_postal');
    }
    public function emploi()
    {
        return $this->hasMany(Emploi::class, 'code_postal', 'code_postal');
    }
}