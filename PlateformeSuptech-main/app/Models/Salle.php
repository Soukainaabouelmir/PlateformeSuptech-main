<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $table = 'salle';
    protected $fillable = [
        'id_salle',
        'num_salle',
        
    ];

    use HasFactory;
    
    public function Assurer_Cours()
    {
        return $this->hasMany(Assurer_Cours::class, 'id_salle',);
    }
}
