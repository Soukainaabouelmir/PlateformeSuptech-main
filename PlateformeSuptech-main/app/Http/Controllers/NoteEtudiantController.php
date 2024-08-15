<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteEtudiantController extends Controller
{
    public function index()
    {
        
        return view('etudiant.views.noteetudiant');
    }
    public function indexx(Request $request)
{
    try {
        // Récupérer les valeurs des critères choisis depuis la requête
        $cycle = $request->input('cycle');
        $filiere = $request->input('filiere');
        $niveau = $request->input('niveau');
        $groupe = $request->input('groupe');
        $matiere = $request->input('matiere');
        
        // Commencer avec une requête pour les étudiants
        $query = Etudians::query();
        
        // Ajouter les clauses de recherche basées sur les critères choisis
        $query->where('Cycle', $cycle)
              ->where('Groupe', $groupe)
              ->where('Matiere', $matiere);
        
        // Ajouter le critère du niveau uniquement si le champ de la filière est rempli
        if ($filiere) {
            $query->where('Filiere', $filiere);
            
            // Inclure le critère de niveau si le champ de niveau est également rempli
            if ($niveau) {
                $query->where('Niveau', $niveau);
            }
        }
        // Exécuter la requête et récupérer les résultats
        $etudians = $query->get(['Nom', 'Prenom']);
        
        // Utiliser dd pour afficher les résultats de la requête
        //dd($etudians);
        
        // Retourner la vue avec les étudiants filtrés
        return view('Prof.views.listepresence', compact('etudians'));
    } catch (\Throwable $th) {
        $th->getMessage();
    }
}
}

