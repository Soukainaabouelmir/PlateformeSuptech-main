<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table = 'reclamations';
    
    protected $fillable = [
        'apogee',
        
        'type_reclamation',
        'Description',
        'file_reclamation',
        
    ];
    public $timestamps = false;
}
