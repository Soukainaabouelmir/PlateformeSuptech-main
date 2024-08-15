<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    // Nom de la table associée à ce modèle
    protected $table = 'cycle';

    // Clé primaire associée à la table
    protected $primaryKey = 'id_cycle';

    // Si la clé primaire n'est pas un entier auto-incrémenté
    public $incrementing = false;

    // Si votre clé primaire n'est pas de type int
  
    // Si la table n'a pas de colonnes created_at et updated_at
    public $timestamps = false;

    // Définir les colonnes qui peuvent être mass assignables
    protected $fillable = ['id_cycle', 'cycle_intitule'];

    // Relations
    public function filieres()
    {
        return $this->hasMany(Filiere::class, 'id_cycle', 'id_cycle');
    }
}
