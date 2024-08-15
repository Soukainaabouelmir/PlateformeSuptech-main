<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{  public function etudient()
    {
        return $this->hasMany(Etudains::class, 'apogee',);
    }
    public function element()
    {
        return $this->hasMany(Element::class, 'num_element',);
    }
    protected $table = 'notes_evaluation';
    protected $primaryKey = 'apogee';
    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'apogee',
        'num_element',
        'EF',
        'RATT',
        'CTR1',
        'CTR2',
        'TP',
        'PFE',
       
    ];
}