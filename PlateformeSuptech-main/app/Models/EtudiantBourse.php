<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantBourse extends Model
{
    use HasFactory;
    protected $table = 'etudient_bourse';
    protected $primaryKey = ['id_bourse', 'apogee'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_bourse', 'apogee'
    ];
    public function etudiant()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }

    public function bourse()
    {
        return $this->belongsTo(Bourse::class, 'id_bourse', 'id_bourse');
    }
}
