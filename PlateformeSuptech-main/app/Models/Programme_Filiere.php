<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme_Filiere extends Model
{
    protected $table = 'programme_filiere';
    protected $fillable = [
        
        'num_element',
        'id_filiere',
        
    ];
}
