<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $table = 'semestre';
    
    protected $fillable = [
        'id_semestre',
        
        
        'description',
        
        
    ];
    use HasFactory;
    public function emploi()
    {
        return $this->hasMany(Emploi::class, 'id_semestre', 'id_semestre');
    }
}
