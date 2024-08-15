<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'date';
    use HasFactory;
    public $timestamps = false;

   
    protected $fillable = [
       
       
        'id_date',
        
        'date',
          
           
       ];
      
    
    public function Assurer_Cours()
    {
        return $this->hasMany(Assurer_Cours::class, 'id_date',);
    }
}
