<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';
    protected $primaryKey = 'apogee';
    public $incrementing = false;

    public $timestamps = false;
    public function etudient()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }
    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre', 'id_semestre');
    }

   
    protected $fillable = [
        'apogee',
        'code_postal',
        'num_annee',
        'id_filiere',
        'id_semestre',
       
    ];
   
    }