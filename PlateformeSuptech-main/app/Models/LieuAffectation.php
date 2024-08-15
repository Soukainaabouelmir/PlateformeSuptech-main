<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuAffectation extends Model
{
    use HasFactory;
    protected $table = 'lieu_affectation';
   
    protected $fillable = [
       
       
        'id_lieu',
        'lieu_intitule',
        'code_postal',
       
          
           
       ];
    public $timestamps = false;
    public function personnel()
    {
        return $this->belongsToMany(Personnel::class, 'lieu_personnel', 'id_lieu', 'id_personnel');
    }
}
