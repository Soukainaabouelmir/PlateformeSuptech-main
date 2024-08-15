<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Personnel;


class RhPersonnelControlleur extends Controller
{
    



   
    public function index()
    {
        
        $etudiants = Etudians::paginate(10); 

        
    return view('RH.views.rhpersonnel', ['etudiants' => $etudiants]);


    }

    
    public function fetchPersonnel()
{
    $personnel = Personnel::leftJoin('lieu_personnel', 'personnel.id_personnel', '=', 'lieu_personnel.id_personnel')
    ->leftJoin('lieu_affectation', 'lieu_personnel.id_lieu', '=', 'lieu_affectation.id_lieu')
    ->select([
        'personnel.id_personnel',
        'personnel.nom',
        'personnel.prenom',
        'personnel.matricule_cnss',
        'personnel.RIB',
        'personnel.type_contrat',
        'personnel.CIN',
        'personnel.contrat_pdf',
        'personnel.cv_pdf',
        'personnel.cin_pdf',
        'lieu_affectation.lieu_intitule as lieu_affect'
        
    ]);

    return DataTables::of($personnel)
        ->addIndexColumn()
       
        ->addColumn('contrat_pdf', function ($personnel) {
            return $personnel->contrat_pdf ? '<a href="' . asset('asset/images/' . $personnel->contrat_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addColumn('cv_pdf', function ($personnel) {
            return $personnel->cv_pdf ? '<a href="' . asset('asset/images/' . $personnel->cv_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addColumn('cin_pdf', function ($personnel) {
            return $personnel->cin_pdf ? '<a href="' . asset('asset/images/' . $personnel->cin_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addIndexColumn()
        ->addColumn('actions', function($personnel) {
            return '<div style="display: flex; gap: 5px;">
                    <button type="button" class="btn btn-primary edit-btn" data-id="' . $personnel->id_personnel . '">Modifier</button>
                    <form id="delete-form-' . $personnel->id_personnel . '" action="' . route('personnel.destroy', $personnel->id_personnel) . '" method="POST">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $personnel->id_personnel . ')" style="width:auto;">Supprimer</button>
                    </form>
                </div>';
    })
        
        
       
        ->rawColumns([ 'contrat_pdf', 'cv_pdf', 'cin_pdf', 'actions'])
        ->make(true);
}

public function updatePersonnel(Request $request)
{
    // Récupérer le personnel à partir de l'ID
    $personnel = Personnel::where('id', $request->id)->firstOrFail();

    // Mettre à jour les informations du personnel avec les données du formulaire
    $personnel->nom = $request->nom;
    $personnel->prenom = $request->prenom;
    $personnel->matricule_cnss = $request->matricule_cnss;
    $personnel->etablissement = $request->etablissement;
    $personnel->RIB = $request->RIB;
    $personnel->type_contrat = $request->type_contrat;

    $personnel->save();

    return redirect()->back()->with('success', 'Les informations du personnel ont été mises à jour avec succès.');
}


public function destroy($id_personnel)
{
    // Find the personnel by cin_salarie
    $personnel = Personnel::where('id_personnel', $id_personnel)->firstOrFail();

    // Delete the personnel
    $personnel->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Personnel supprimé avec succès.');
}
public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'matricule_cnss' => 'required|string|max:255',
            'RIB' => 'required|string|max:255',
            'type_contrat' => 'required|string|max:255',
            'est_prof' => 'nullable',
            'est_Salarie' => 'nullable',
            'est_Doctorant' => 'nullable',
            'contrat_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'cv_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'cin_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $personnel = new Personnel($validatedData);
        
        if ($request->hasFile('contrat_pdf')) {
            $file = $request->file('contrat_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->contrat_pdf = $fileName;
        }
        if ($request->hasFile('cv_pdf')) {
            $file = $request->file('cv_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->cv_pdf = $fileName;
        }
        if ($request->hasFile('cin_pdf')) {
            $file = $request->file('cin_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->cin_pdf = $fileName;
        }

        $personnel->save();

        if ($personnel->id_personnel) {
            DB::table('lieu_personnel')->insert([
                'id_personnel' => $personnel->id_personnel,
                'id_lieu' => $request->input('id_lieu')
            ]);
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to retrieve personnel ID.']);
        }
        return redirect()->back()->with('success', 'Personnel ajouté avec succès!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
}