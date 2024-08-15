<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = 'pays';
    protected $primaryKey = 'id_pays';
    public function etudiants()
    {
        return $this->hasMany(Etudians::class, 'id_pays', 'id_pays');
    }
    use HasFactory;

}
