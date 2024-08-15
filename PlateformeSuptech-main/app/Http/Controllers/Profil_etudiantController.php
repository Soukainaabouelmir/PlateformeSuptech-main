<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Etudians;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Tuteur_Etudiant;
use App\Models\Tuteur;
use App\Models\Bourse;
use App\Models\Diplome;
use App\Models\Pays;
use App\Models\Cycle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class Profil_etudiantController extends Controller
{

   

public function uploadImage(Request $request)
{
    // Validation de l'image
    $request->validate([
        'image' => 'required|image',
    ]);

    $user = Auth::guard('etudient')->user();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName(); 
        $file->move(public_path('asset/images'), $fileName); 
        $user->image = $fileName;
        $user->save();
    }

    return redirect()->route('Profil_etudiant')->with('success', 'Image mise à jour avec succès.');
} 
    
    

public function index()
{
    $user = Auth::guard('etudient')->user();
    $apogee = $user->apogee;

    // Récupérer les informations de l'étudiant avec ses relations
    $etudiant = Etudians::with([
        'etablissement', 
        'pays', 
       
        'inscriptions.filiere.cycle',
        'tuteur', 
        'bourse',
        'diplome'
         // Charger les bourses associées
    ])->find($apogee);
    $cycle = Cycle::join('filiere', 'cycle.id_cycle', '=', 'filiere.id_cycle')
    ->join('inscriptions', 'filiere.id_filiere', '=', 'inscriptions.id_filiere')
    ->where('inscriptions.apogee', $apogee)
    ->first(['cycle.cycle_intitule']);
    // Obtenez les tuteurs associés
    $tuteur = Tuteur::join('tuteur_etudiant', 'tuteur.id_tuteur', '=', 'tuteur_etudiant.id_tuteur')
        ->where('tuteur_etudiant.apogee', $apogee)
        ->get();
        $bourse = Bourse::join('etudient_bourse', 'bourse.id_bourse', '=', 'etudient_bourse.id_bourse')
        ->where('etudient_bourse.apogee', $apogee)
        ->get();
        $filiere = Inscription::join('filiere', 'inscriptions.id_filiere', '=', 'filiere.id_filiere')
        ->where('inscriptions.apogee', $apogee)
        ->get();
        $pays = Pays::join('etudient', 'pays.id_pays', '=', 'etudient.id_pays')
        ->where('etudient.apogee', $apogee)
        ->get(['pays.*']);

        $etablissement = Etablissement::join('etudient', 'etablissement.code_postal', '=', 'etudient.code_postal')
        ->where('etudient.apogee', $apogee)
        ->get(['etablissement.*']);

        $inscriptions = Inscription::join('etudient', 'inscriptions.apogee', '=', 'etudient.apogee')
        ->where('etudient.apogee', $apogee)
        ->get();
    
    // Déboguer les données
   

    // Retourner la vue avec les données
    return view('etudiant.views.Profil_etudiant', compact('user','inscriptions', 'etudiant', 'tuteur','filiere','pays','cycle','etablissement','bourse'));
}



}


   
    

