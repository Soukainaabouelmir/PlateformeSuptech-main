<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme_Evaluation extends Model
{
    protected $table = 'programme_evaluation';
    protected $fillable = [
       
        'id_element',
        'code_postal',
        'id_filiere',
        'heure_exam',
        'date_exam',
        
    ];
   
    public function element()
    {
        return $this->belongsTo(Element::class, 'id_element', 'id_element');
    }
    public function etablissment()
    {
        return $this->belongsTo(Etablissment::class, 'code_postal', 'code_postal');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }
    public $timestamps = false;
}
