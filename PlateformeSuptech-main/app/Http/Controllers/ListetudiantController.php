<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Etudians;
use App\Models\Filiere;
use App\Models\Inscription;
use App\Models\Tuteur;
use App\Models\Tuteur_Etudiant;
use App\Models\Bourse;
use App\Models\Diplome;
use App\Models\Diplome_etudiant;
use App\Models\EtudiantBourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ListetudiantController extends Controller
{
    public function index()
    {
        $filieres = Filiere::all();
        $etablissements = Etablissement::all();
        $etudiants = Etudians::paginate(10);

        return view('scolarite.views.listeetudiant', compact('etablissements', 'filieres'));
    }
    public function fetchEtudiantss()
    {
        $etudiants = Etudians::join('inscriptions', 'etudient.apogee', '=', 'inscriptions.apogee')
                             ->join('filiere', 'inscriptions.id_filiere', '=', 'filiere.id_filiere')
                             ->join('etablissement', 'etudient.code_postal', '=', 'etablissement.code_postal')
                             ->leftJoin('tuteur_etudiant', 'etudient.apogee', '=', 'tuteur_etudiant.apogee')
                             ->leftJoin('tuteur', 'tuteur_etudiant.id_tuteur', '=', 'tuteur.id_tuteur')
                             ->leftJoin('etudient_bourse', 'etudient.apogee', '=', 'etudient_bourse.apogee')
                             ->leftJoin('bourse', 'etudient_bourse.id_bourse', '=', 'bourse.id_bourse')
                             ->select([
                                'etudient.id',
                                 'etudient.apogee',
                                 'etudient.CNE',
                                 'etudient.CNI',
                                 'etudient.Nom',
                                 'etudient.Prenom',
                                 'etudient.telephone',
                                 'etudient.Email',
                                 'etudient.Adresse',
                                 'etudient.Sexe',
                                 'etudient.Date_naissance',
                                 'filiere.intitule as filiere', // Assuming the column is named 'nom_filiere'
                                 'etablissement.ville', // Assuming the column is named 'ville'
                                 'tuteur.nom as tuteur_nom',
                             'tuteur.tel1 as tuteur_tel1',
                             'bourse.taux_bourse as bourse_taux_bourse',
                             'tuteur.adresse as tuteur_adresse' // Assuming the column is named 'telephone'
                             ]);
    
        return DataTables::of($etudiants)
        ->addIndexColumn()
        ->addColumn('actions', function($etudiant) {
            return '<div style="display: flex; gap: 5px;">
                    <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiant->id . '" style="width:auto; background-color: #173165;">Modifier</button>
                    <form id="delete-form-' . $etudiant->id . '" action="' . route('etudiants.destroy', $etudiant->id) . '" method="POST" style="margin: 0;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $etudiant->id . ')" style="width:auto;">Supprimer</button>
                    </form>
                </div>';
    })
           
 
        ->rawColumns(['actions'])
            ->make(true);
    }
    
    // EtudiantController.php

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validationRules = [
            'apogee' => 'required',
            'CNE' => 'required',
            'CNI' => 'nullable',
            'Sexe' => 'nullable',
            'Prenom' => 'required',
            'Nom' => 'required',
            'Date_naissance' => 'nullable',
            'Email' => 'nullable',
            'telephone' => 'nullable',
            'Adresse' => 'nullable',
            'id_bourse' => 'nullable|exists:bourse,id_bourse',
            'id_tuteur' => 'nullable|exists:tuteur,id_tuteur',
            'nom' => 'nullable',
            'tel1' => 'nullable',
            'adresse' => 'nullable',
        ];
    
        // Validation
        $validator = \Validator::make($request->all(), $validationRules);
    
        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation échouée',
                'messages' => $validator->errors()
            ], 422);
        }
    
        try {
           
            $etudiant = Etudians::findOrFail($id);
    
           
            $updatedFields = $request->only([
                'apogee', 'CNE', 'CNI', 'Sexe', 'Date_naissance',
                'Nom', 'Prenom', 'Email', 'telephone', 'Adresse',
            ]);
    
            \Log::info('Champs à mettre à jour pour l\'étudiant :', $updatedFields);
    
            $etudiant->update($updatedFields);
    
            
            if ($request->has('id_bourse') && $request->input('id_bourse') !== null) {
                
                $etudiant->bourse()->sync([$request->input('id_bourse')]);
            }
    
           
            if ($request->has('id_tuteur') && $request->input('id_tuteur') !== null) {
                $tuteur = Tuteur::find($request->input('id_tuteur'));
                if ($tuteur) {
                    $tuteur->update([
                        'nom' => $request->input('nom'),
                        'tel1' => $request->input('tel1'),
                        'adresse' => $request->input('adresse'),
                    ]);
                } else {
                    return response()->json(['error' => 'Tuteur non trouvé'], 404);
                }
            }
    
            return response()->json(['message' => 'Étudiant mis à jour avec succès']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Ressource non trouvée'], 404);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Erreur de base de données'], 500);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Erreur inconnue'], 500);
        }
    }
    

    

    

    public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'Nom' => 'required',
        'Prenom' => 'required',
        'CNE' => 'required',
        'CNI' => 'required',
        'Sexe' => 'required',
        'Date_naissance' => 'required',
        'id_pays' => 'required',
        'code_postal' => 'required',
        'Email' => 'required',
        'telephone' => 'required',
        'Adresse' => 'required',
        'num_annee' => 'required',
        'id_semestre' => 'required',
        'id_filiere' => 'required',
        'nom' => 'required',
        
        'tel1' => 'required',
        'adresse' => 'required',
        'id_bourse' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        $dateInscription = $request->input('num_annee');
        $apogee = $this->generateApogee($dateInscription);

        // Créer l'étudiant
        Etudians::create([
            'apogee' => $apogee,
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'CNE' => $request->input('CNE'),
            'CNI' => $request->input('CNI'),
            'Sexe' => $request->input('Sexe'),
            'Date_naissance' => $request->input('Date_naissance'),
            'Email' => $request->input('Email'),
            'telephone' => $request->input('telephone'),
            'Adresse' => $request->input('Adresse'),
            'id_pays' => $request->input('id_pays'),
            'code_postal' => $request->input('code_postal'),
        ]);

        // Créer l'inscription
        Inscription::create([
            'apogee' => $apogee,
            'id_filiere' => $request->input('id_filiere'),
            'id_semestre' => $request->input('id_semestre'),
            'num_annee' => $dateInscription,
        ]);

        // Créer le tuteur
        $tuteur = Tuteur::create([
            'nom' => $request->input('nom'),
            'tel1' => $request->input('tel1'),
            'adresse' => $request->input('adresse'),
        ]);

        // Associer le tuteur à l'étudiant
        Tuteur_Etudiant::create([
            'apogee' => $apogee,
            'id_tuteur' => $tuteur->id_tuteur,
        ]);
       

        // Associer le tuteur à l'étudiant
       Diplome_etudiant::create([
            'apogee' => $apogee,
            'Annee_bac' => $request->input('Annee_bac'),
            'mention' => $request->input('mention'),
            'Annee_bac' => $request->input('Annee_bac'),
            'id_diplome' =>$request->input('id_diplome'),
        ]);

        // Associer la bourse à l'étudiant
        EtudiantBourse::create([
            'id_bourse' => $request->input('id_bourse'),
            'apogee' => $apogee,
        ]);

        return response()->json(['message' => 'Étudiant ajouté avec succès', 'apogee' => $apogee], 201);

    } catch (\Exception $e) {
        \Log::error('Erreur lors de l\'ajout de l\'étudiant : ' . $e->getMessage());
        return response()->json(['message' => 'Erreur lors de l\'ajout de l\'étudiant', 'error' => $e->getMessage()], 500);
    }
}

private function generateApogee($dateInscription)
{
   
    $year = $dateInscription;

   
    $randomNumber = mt_rand(1000, 9999);

    
    return $year . $randomNumber;
}


public function destroy($id)
{
    try {
        $etudiant = Etudians::find($id);

        if (!$etudiant) {
            return response()->json(['message' => 'Étudiant non trouvé'], 404);
        }

        \Log::info('Suppression des relations pour l\'étudiant: ' . $id);

       
        $etudiant->tuteur()->detach(); 
        $etudiant->inscriptions()->delete();
        $etudiant->paiements()->delete();
        $etudiant->demande()->delete();
        $etudiant->diplome()->detach();

        \Log::info('Suppression de l\'étudiant: ' . $id);

        
        $etudiant->delete();

        return response()->json(['message' => 'Étudiant supprimé avec succès']);
    } catch (\Exception $e) {
        \Log::error('Erreur lors de la suppression de l\'étudiant : ' . $e->getMessage());
        return response()->json(['message' => 'Erreur lors de la suppression de l\'étudiant', 'error' => $e->getMessage()], 500);
    }
}



   
}
