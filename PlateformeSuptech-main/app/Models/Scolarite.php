<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Scolarite extends Authenticatable implements AuthenticatableContract
{
    
    use HasFactory;
    protected $table = 'personnel';

    protected $guard = 'scolarite';

    protected $fillable = [
        'cin_salarie',
        'nom',
        'prenom',
        'mail',
    ];

    protected $hidden = [
        'cin_salarie', 'remember_token',
    ];
}
