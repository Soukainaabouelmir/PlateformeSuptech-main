<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Admin extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $table = 'admin';

    protected $guard = 'admin';

    protected $fillable = [
        'mot_pass',
        'nom',
        'prenom',
        'nom_utilisateur',
    ];

    protected $hidden = [
        'mot_pass', 'remember_token',
    ];
}
