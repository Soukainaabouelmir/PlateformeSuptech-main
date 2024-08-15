<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne

class Paiement extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'paiement';
    protected $fillable = [
        'id',
       'apogee',
        'montant',
      'id_typepaiement',
      'id_filiere',
        'date_paiement',
        'id_modepaiement',
        'mois_concerne',
        'image',
        'status',
        
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }
    public function modepaiement()
    {
        return $this->belongsTo(Modepaiement::class, 'id_modepaiement', 'id_modepaiement');
    }
    public function typepaiement()
    {
        return $this->belongsTo(Typepaiement::class, 'id_typepaiement', 'id_typepaiement');
    }

    // j'ai ajouté cette méthode pour obtenir la description du mode de paiement
    public function getModePaiementDescription()
    {
        return DB::table('mode_paiement')
                ->where('id_modepaiement', $this->id_modepaiement)
                ->value('description');
    }
    // Méthode pour obtenir la description du type de paiement
    public function getTypePaiementDescription()
    {
        return DB::table('type_paiement')
                ->where('id_typepaiement', $this->id_typepaiement)
                ->value('description');
    }
}
