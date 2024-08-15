<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RH extends Model
{
    use HasFactory;
    protected $table = 'RH';
    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_passe'
    ];
    public $timestamps = false;
}
