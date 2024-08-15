<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document_admin';
    protected $fillable = [ 'id_document','description'];

    use HasFactory;
   
}
