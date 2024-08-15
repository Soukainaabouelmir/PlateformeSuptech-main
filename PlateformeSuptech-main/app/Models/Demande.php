<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $table = 'demandes_etudiant';
    protected $fillable = ['apogee', 'id_filiere', 'id_document','date_demande','status','message','archive'];

    public $timestamps = false;
    public function etudient()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }
    public function filiere()
{
    return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
}
public function document()
{
    return $this->belongsTo(Document::class, 'id_document', 'id_document');
}
}

   

