<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel; 
use App\Models\Enseignant; 
use App\Models\Element;
use App\Models\Absence_Accueil; 
use DataTables;
use Illuminate\Support\Facades\Log;

class AbsenceProfacceuilcontroller extends Controller
{
    public function data(Request $request)
    {
        // Vérifiez si la requête est pour DataTables
        if ($request->ajax()) {
            $data = Personnel::where('est_prof', 1)->get(['CIN', 'nom', 'prenom']);
            
            return DataTables::of($data)
            ->addColumn('actions', function ($row) {
                // Ajoutez un bouton Edit avec un attribut data-id pour identifier l'entrée
                return '<button class="btn btn-info edit-btn" data-id="' . $row->id_personnel . '">Edit</button>';
            })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return abort(404);
    }
    

    public function create()
    {
        $elements = Element::all();
        
        return view('accueil.views.absenceprof', compact('elements'));
    }

    public function store(Request $request)
    {
        Log::info('Requête de validation :', $request->all());

        $validatedData = $request->validate([
            'cin_salarie' => 'required|exists:personnel,cin_salarie', // Correction du nom de la table
            'num_element' => 'required|exists:element,num_element', // Correction du nom de la table
            'heure_depart' => 'required',
            'heure_fin' => 'required',
            'date_seance' => 'required',
        ]);

        Log::info('Validation réussie.');
        Log::info('Données validées :', $validatedData);

        $absence = new Absence_Accueil();
        $absence->cin_salarie = $validatedData['cin_salarie'];
        $absence->num_element = $validatedData['num_element'];
        $absence->heure_depart = $validatedData['heure_depart'];
        $absence->heure_fin = $validatedData['heure_fin'];
        $absence->date_seance = $validatedData['date_seance'];

        Log::info('Données d\'absence avant enregistrement :', $absence->toArray());

        $absence->save();

        Log::info('Absence enregistrée avec succès :', $absence->toArray());

        return redirect()->route('absenceacceuil')->with('success', 'Absence enregistrée avec succès.');
    }
}
