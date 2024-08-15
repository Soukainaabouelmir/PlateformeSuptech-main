<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typepaiement extends Model
{
    protected $table = 'type_paiement';
    protected $fillable = [
        'id_typepaiement',
        'description',
        'cout',

    ];
    public $timestamps = false;
    use HasFactory;
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_typepaiement', 'id_typepaiement');
    }
}
