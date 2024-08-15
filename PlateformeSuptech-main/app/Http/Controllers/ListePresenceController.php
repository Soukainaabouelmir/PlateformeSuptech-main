<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Inscription;
use App\Models\Absence;
use DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
class ListePresenceController extends Controller
{
    



    public function getEtudiants(Request $request)
    {
        $etab = $request->input('etablissement');
        $cycle = $request->input('cycle');
        $filiere = $request->input('filiere');
        $matiere = $request->input('matiere');
        $groupe = $request->input('groupe');
        $niveau = $request->input('niveau');

        $request->session()->put('etablissement', $etab);
        $request->session()->put('cycle', $cycle);
        $request->session()->put('filiere', $filiere);
        $request->session()->put('matiere', $matiere);
        $request->session()->put('groupe', $groupe);
        $request->session()->put('niveau', $niveau);

        // Récupérer la date et l'heure actuelles
        $date = Carbon::now()->toDateString();
        $heure = Carbon::now()->toTimeString();

        // Récupérer le num_element de l'élément (matière) choisi
        $element = Element::where('intitule', $matiere)->first();

        if (!$element) {
            return response()->json(['error' => 'Element not found'], 404);
        }

        // Récupérer les étudiants en fonction des critères
        $etudiants = Etudians::query()
            ->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
            ->join('filiere', 'filiere.id_filiere', '=', 'inscriptions.id_filiere')
            ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
            ->join('groupe', 'groupe.id_filiere', '=', 'filiere.id_filiere')
            ->where('etablissement.ville', $etab)
            ->where('filiere.cycle', $cycle)
            ->where('groupe.intitule', $groupe)
            ->whereNull('inscriptions.niveau')
            ->where('filiere.intitule', $filiere)
            ->select('etudient.*')
            ->get();

        // Insérer les enregistrements dans la table 'absence'
        foreach ($etudiants as $etudiant) {
            Absence::create([
                'apogee' => $etudiant->apogee,
                'num_element' => $element->num_element,
                'date_abs' => $date,
                'heure_abs' => $heure,
                'absence' => null
            ]);






        }

    // Afficher les étudiants dans la vue
    return view('Prof.views.listepresence');


      
       
    
      
        
        
      
    
    }
    
    public function getEtudiantsData(Request $request)
    { 
         // Récupérez les valeurs choisies
         $etab = $request->session()->get('etablissement');
         $cycle = $request->session()->get('cycle');
         $filiere = $request->session()->get('filiere');
         $matiere = $request->session()->get('matiere');
         $groupe = $request->session()->get('groupe');
         $niveau = $request->session()->get('niveau');
         $currentDate = Carbon::now()->toDateString();
         $currentTime = Carbon::now()->toTimeString();
     
         // Période de deux heures (vous pouvez ajuster selon vos besoins)
         $currentDate = Carbon::now()->toDateString();
        $oneMinuteAgo = Carbon::now()->subMinute()->toTimeString();

        $query = Etudians::query()
            ->select([
                'absence.id_absence as numero',
                'etudient.apogee as Apogee',
                'etudient.CNE',
                'etudient.CNI',
                'etudient.Nom',
                'etudient.Prenom',
                'absence.date_abs as Date',
                DB::raw('TIME_FORMAT(absence.heure_abs, "%H:%i") as Heure'),
                'absence.absence as absence'
            ])
             ->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
             ->join('absence', 'absence.apogee', '=', 'etudient.apogee')
             ->join('element', 'element.num_element', '=', 'absence.num_element')
             ->join('filiere', 'filiere.id_filiere', '=', 'inscriptions.id_filiere')
             ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
             ->join('groupe', 'groupe.id_filiere', '=', 'filiere.id_filiere')
             ->where('absence.date_abs', '=', $currentDate)
             ->where('absence.heure_abs', '>=', $oneMinuteAgo);
     
         if ($etab) {
             $query->where('etablissement.ville', $etab);
         }
         if ($cycle) {
             $query->where('filiere.cycle', $cycle);
         }
         if ($matiere) {
             $query->where('element.intitule', $matiere);
         }
         if ($groupe) {
             $query->where('groupe.intitule', $groupe);
         }
         if ($niveau) {
             $query->where('inscriptions.niveau', $niveau);
         }
         if ($filiere) {
             $query->where('filiere.intitule', $filiere);
         }
         
         \Log::info($query->toSql());
         \Log::info($query->getBindings());
 
         $etudiants = $query->distinct()->get();



         
         $formattedData = DataTables::of($etudiants)
             ->addIndexColumn()
             ->addColumn('absence', function ($etudiant) {
                return '
                    <select class="form-control absence-select" data-apogee="' . $etudiant->numero . '">
                        <option value="">Sélectionner</option>
                        <option value="A" ' . ($etudiant->absence === 'A' ? 'selected' : '') . '>A</option>
                        <option value="P" ' . ($etudiant->absence === 'P' ? 'selected' : '') . '>P</option>
                        <option value="R" ' . ($etudiant->absence === 'R' ? 'selected' : '') . '>R</option>
                    </select>
                ';
            })
            ->rawColumns(['absence'])
            ->make(true);
 
         return $formattedData;
     } 
     
        
    
    
    
      
            
     
     
   
     
      


    /* public function updateAbsence(Request $request)
     {
         $validated = $request->validate([
             'apogee' => 'required|exists:absence,apogee',
             'absence' => 'nullable|in:A,P,R',
         ]);
     
         // Affiche les données validées pour vérification
         \Log::info('Données validées: ', $validated);
     
         try {
             DB::beginTransaction();
     
             // Trouver l'absence en utilisant le code Apogee
             $absence = Absence::where('apogee', $validated['apogee'])->first();
     
             // Vérifiez si l'enregistrement est trouvé
             if (!$absence) {
                 \Log::warning('Aucune absence trouvée pour Apogee: ' . $validated['apogee']);
                 DB::rollback();
                 return redirect()->back()->with('error', 'Aucune absence trouvée pour cet Apogee.');
             }
     
             \Log::info('Absence trouvée: ', $absence->toArray());
     
             // Mettre à jour l'état, en gérant les valeurs nulles
             $absence->absence = $validated['absence'] ?? null;
             $absence->save();
     
             \Log::info('Absence mise à jour avec succès pour Apogee: ' . $validated['apogee']);
     
             DB::commit();
     
             return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
         } catch (\Exception $e) {
             DB::rollback();
             \Log::error('Erreur de mise à jour de l\'absence : ' . $e->getMessage());
             return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour des informations de l\'étudiant.');
         }
     }*/
     public function saveAbsence(Request $request)
{ 
    \Log::info($request->all());

    $validated = $request->validate([
        'updates' => 'required|array',
        'updates.*.id_absence' => 'required|exists:absence,id_absence',
        'updates.*.absence' => 'nullable|in:A,P,R',
    ]);

    try {
        DB::beginTransaction();

        foreach ($validated['updates'] as $update) {
            $absence = Absence::where('id_absence', $update['id_absence'])->first();
            if ($absence) {
                $absence->absence = $update['absence'] ?? null;
                $absence->save();
            }
        }

        DB::commit();
        return response()->json(['success' => 'Absences mises à jour avec succès.']);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['error' => 'Une erreur est survenue lors de la mise à jour des absences.'], 500);
    }
}

}