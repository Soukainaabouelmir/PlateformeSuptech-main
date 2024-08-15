<?php 
// app/Http/Controllers/ExamNotificationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Filiere;
use App\Models\Programme_Evaluation;
use App\Models\Inscription;
use App\Models\Etudians;
use Illuminate\Support\Facades\Auth;

class ExamNotificationController extends Controller
{
   

    public function create()
    {
        $elements = Element::all();
        $filieres = Filiere::all();
        
        return view('scolarite.views.notificationsexam', compact('elements', 'filieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_element' => 'required|exists:element,id_element',
            'id_filiere' => 'required|exists:filiere,id_filiere',
          
            'date_exam' => 'required',
            'heure_exam' => 'required',
        ]);

        Programme_Evaluation::create([
            'id_element' => $request->id_element,
            'id_filiere' => $request->id_filiere,
          
            'date_exam' => $request->date_exam,
            'heure_exam' => $request->heure_exam,
        ]);

        
        return redirect()->route('scolarite.views.notificationsexam')->with('success', 'Notification envoyée avec succès.');
    }

    
   
    

    public function studentExams()
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
  
    
    
    
   
    \Log::info('Filière de l\'étudiant : ' . $idFiliere);
    \Log::info('Code établissement de l\'étudiant : ' . $codepostal);
    
    // Récupérer les emplois du temps pour la filière, l'établissement et le groupe de l'étudiant
    $exams = Programme_Evaluation::where('id_filiere', $idFiliere)
                     ->get();

    // Utiliser dd() pour vérifier les données récupérées
   

    \Log::info('Emplois récupérés : ' . json_encode($exams));

    return view('etudiant.views.exametudiant', compact('exams'));
}
}