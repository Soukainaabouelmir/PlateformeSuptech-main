<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Assurer_Cours;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Personnel;
use App\Models\Salle;
use App\Models\Date;
use App\Models\Heure_Fin;
use App\Models\Heure_Debut;
use App\Models\Etudians;
use DataTables;
class calendarcontroller extends Controller
{
    public function index()
{
    $filieres = Filiere::all();
    $elements = Element::all();
   
    $professors = Personnel::where('est_prof', 1)->get();
    $salles = Salle::all();
    $heure_fins = Heure_Fin::all();
    $heure_debuts = Heure_Debut::all();
    return view('scolarite.views.calendar',compact('elements','professors', 'filieres','salles','heure_fins','heure_debuts'));
}
public function indexx()
{
    return view('scolarite.views.table');
}

// app/Http/Controllers/EtudiantController.php




   

    








public function saveEvent(Request $request)
{
    // Validation des données
    $request->validate([
        'id_element' => 'required|exists:element,id_element',
        'N_Groupe' => 'required',
        'id_prof' => 'required|exists:personnel,id_personnel',
        'date' => 'required',
        'heure_debut' => 'required|exists:heure_debut,id_heure_debut',
        'heure_fin' => 'required|exists:heure_fin,id_heure_fin',
    ]);

    // Vérifier si la date existe déjà dans la table date
    $date = Date::firstOrCreate(
        ['date' => $request->input('date')],
        ['date' => $request->input('date')]
    );

    // Enregistrement dans la table assurer_cours
    Assurer_Cours::create([
        'id_salle' => $request->input('salle'), // Assurez-vous de fournir l'ID de la salle
        'id_date' => $date->id_date, // Utiliser l'ID de la date
        'id_heure_debut' => $request->input('heure_debut'),
        'id_heure_fin' => $request->input('heure_fin'),
        'id_prof' => $request->input('id_prof'),
        'id_element' => $request->input('id_element'),
        'N_Groupe' => $request->input('N_Groupe'),
    ]);

    // Retourner une réponse
    return response()->json(['success' => true]);
}

public function getEvents()
{
    $events = Assurer_Cours::with(['element', 'professeur', 'salle', 'date', 'heureDebut', 'heureFin'])
                ->get()
                ->map(function ($event) {
                    return [
                        'title' => optional($event->element)->intitule,
                        'start' => optional($event->date)->date . 'T' . optional($event->heureDebut)->heure_debut,
                        'end' => optional($event->date)->date . 'T' . optional($event->heureFin)->heure_fin,
                        'backgroundColor' => '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT), 
                        'borderColor' => '#000',
                    ];
                });

    return response()->json($events);
}


}
