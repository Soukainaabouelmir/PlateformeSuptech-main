<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use App\Models\Personnel;
use App\Models\Filiere;
use App\Models\Element;
use App\Models\Inscription;
use App\Models\Demande;
use App\Models\Reclamation;
use App\Models\Enseignant;
use App\Models\Etablissement;
use App\Models\Groupe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $etudiantsCount = Etudians::count();
        $personnelCount = Personnel::count();
        $filieresCount = Filiere::count();
        $elementsCount = Element::count();
        $demandesCount = Demande::count();
        $reclamationsCount = Reclamation::count();
        $enseignantsCount = Enseignant::count();
        $etablissementCount = Etablissement::count();
        $groupeCount = Groupe::count();
    
        $etudiantsCounts = Etudians::count();
        $villes = ['ESSAOUIRA', 'MOHAMMEDIA'];
    $data = [];

    foreach ($villes as $ville) {
        $etablissements = Etablissement::where('ville', $ville)->get(['code_etab']);

        $filiereIds = Inscription::whereIn('code_etab', $etablissements->pluck('code_etab'))
            ->pluck('id_filiere')
            ->unique();

        $filieres = Filiere::whereIn('id_filiere', $filiereIds)->get(['intitule', 'id_filiere']);

        $bubbleData = [];
        foreach ($filieres as $filiere) {
            $etudiantsCounts = Inscription::where('id_filiere', $filiere->id_filiere)
                ->whereIn('code_etab', $etablissements->pluck('code_etab'))
                ->count();
            $bubbleData[] = [
                'label' => $filiere->intitule,
                'count' => $etudiantsCounts,
            ];
        }

        $data[$ville] = $bubbleData;
    }

        //return response()->json($data);
        $etablissements = Etablissement::where('ville', 'ESSAOUIRA')->get(['ville', 'code_etab']);

        // Préparer les données pour le graphique en ligne
        $lineData = [];
        foreach ($etablissements as $etablissement) {
            $etudiantsCounts = Inscription::where('code_etab', $etablissement->code_etab)->count();
            $lineData[] = [
                'x' => $etablissement->ville, // Utiliser le code de l'établissement comme label
                'y' => $etudiantsCounts,
            ];
           
        }
        $etablissements = Etablissement::where('ville', 'MOHAMMEDIA')->get(['ville', 'code_etab']);

        // Préparer les données pour le graphique en ligne
        $lineDatas = [];
        foreach ($etablissements as $etablissement) {
            $etudiantsCounts = Inscription::where('code_etab', $etablissement->code_etab)->count();
            $lineDatas[] = [
                'x' => $etablissement->ville, // Utiliser le code de l'établissement comme label
                'y' => $etudiantsCounts,
            ];
           
        }
       
        $reclamationsParMois = Reclamation::selectRaw('MONTH(updated_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->get();
    
     
        $moisLabels = [];
        $reclamationsData = [];
    
        
        foreach ($reclamationsParMois as $reclamation) {
            
            $moisLabels[] = date("F", mktime(0, 0, 0, $reclamation->mois, 1));
            $reclamationsData[] = $reclamation->total;
        }

        $demandesParMois = Demande::selectRaw('MONTH(updated_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->get();
    
        
        $moisLabel = [];
        $demandesData = [];
    
        // Remplissage des tableaux avec les données récupérées
        foreach ($demandesParMois as $demande) {
            // Récupérer le nom du mois à partir de son numéro
            $moisLabel[] = date("F", mktime(0, 0, 0, $demande->mois, 1));
            $demandesData[] = $demande->total;
        }
    
        // Passage des données à la vue
        return view('Admin.views.dashbord', [
            'etudiantsCount' => $etudiantsCount,
            'etudiantsCounts' => $etudiantsCounts,
            'personnelCount' => $personnelCount,
            'filieresCount' => $filieresCount,
            'elementsCount' => $elementsCount,
            'demandesCount' => $demandesCount,
            'reclamationsCount' => $reclamationsCount,
            'moisLabels' => $moisLabels,
            'moisLabel' => $moisLabel,
           'demandesData'=> $demandesData,
            'reclamationsData' => $reclamationsData,
            'enseignantsCount' =>$enseignantsCount,
            'bubbleData' => $bubbleData,
            'lineDatas' =>$lineDatas,
            'lineData' =>$lineData,
           'data'=>$data,
            'etablissementCount' =>$etablissementCount,
            'groupeCount' =>$groupeCount
            //'lineData'=>$lineData

        ]);
    }
    

        public function getDashboardData()
        {
            $etudiantsCount = Etudians::count();
            $personnelCount = Personnel::count();
            $filieresCount = Filiere::count();
            $elementsCount = Element::count();
        }
}
