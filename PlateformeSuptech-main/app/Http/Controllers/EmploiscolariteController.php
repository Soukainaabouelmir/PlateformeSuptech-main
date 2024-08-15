<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emploi;
use App\Models\Groupe;
use App\Models\Filiere;
use App\Models\Etudians;
use App\Models\Etablissement;
use App\Models\Inscription;

class EmploiscolariteController extends Controller
{
    public function create()
    {
      
        $filieres = Filiere::all();
        $etablissements = Etablissement::all();
        return view('scolarite.views.emploi', compact('filieres','etablissements'));
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            
            'id_filiere' => 'required|exists:filiere,id_filiere',
            'emploi_pdf' => 'required|file|mimes:pdf|max:2048',
           
            'code_postal' => 'required|exists:etablissement,code_postal',
        ]);

        // Création d'une nouvelle instance d'Emploi avec les données validées
        $emploi = new Emploi();
       
        $emploi->id_filiere = $validatedData['id_filiere'];
       
        $emploi->code_postal = $validatedData['code_postal'];

        // Vérification et traitement du fichier PDF téléchargé
        if ($request->hasFile('emploi_pdf')) {
            $file = $request->file('emploi_pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'asset/uploads/' . $fileName;
            $file->move(public_path('asset/uploads'), $fileName);
            $emploi->emploi_pdf = $filePath;
        }

       
        $emploi->save();

        
        return redirect()->route('scolarite.views.emploi')->with('success', 'Emploi du temps envoyé avec succès!');
    }


    public function getGroupesByFiliere($idFiliere)
{
    $groupes = Groupe::where('id_filiere', $idFiliere)->get();
    
   
    
    return response()->json($groupes);
}


public function studentEmploi()
{
    // Récupérer l'apogee de l'étudiant connecté
    $studentApogee = Auth::guard('etudient')->user()->apogee;

    
    if (!$studentApogee) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }

    \Log::info('Apogee de l\'étudiant : ' . $studentApogee);

    // Récupérer l'inscription de l'étudiant
    $inscription = Inscription::where('apogee', $studentApogee)->first();
   $etudiant = Etudians::where('apogee', $studentApogee)->first();
    
    if (!$inscription) {
        \Log::error('Aucune inscription trouvée pour l\'apogee : ' . $studentApogee);
        return redirect()->route('home')->with('error', 'Aucune inscription trouvée.');
    }
    if (!$etudiant) {
        \Log::error('Aucune inscription trouvée pour l\'apogee : ' . $studentApogee);
        return redirect()->route('home')->with('error', 'Aucune inscription trouvée.');
    }
    $idFiliere = $inscription->id_filiere;
    $codepostal = $etudiant->code_postal;
    
    
    
   
    \Log::info('Filière de l\'étudiant : ' . $idFiliere);
    \Log::info('Code établissement de l\'étudiant : ' . $codepostal);
    
    // Récupérer les emplois du temps pour la filière, l'établissement et le groupe de l'étudiant
    $emplois = Emploi::where('id_filiere', $idFiliere)
                     ->where('code_postal', $codepostal)
                     ->get();

    // Utiliser dd() pour vérifier les données récupérées
   

    \Log::info('Emplois récupérés : ' . json_encode($emplois));

    return view('etudiant.views.emploietudiant', compact('emplois'));
}




    

}
