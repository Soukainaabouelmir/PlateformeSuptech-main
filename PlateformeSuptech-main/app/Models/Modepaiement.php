<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modepaiement extends Model
{
    protected $table = 'mode_paiement';
    protected $fillable = [
        'id_modepaiement',
        'description',

    ];
    use HasFactory;
    public $timestamps = false;
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_modepaiement', 'id_modepaiement');
    }
}
