<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Prof extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $table = 'personnel';

    protected $guard = 'prof';

    protected $fillable = [
        'cin_salarie',
        'nom',
        'prenom',
        'matricule_cnss',
    ];

    protected $hidden = [
        'cin_salarie', 'remember_token',
    ];
    
}




