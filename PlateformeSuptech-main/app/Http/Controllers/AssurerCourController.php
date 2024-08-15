<?php
namespace App\Http\Controllers;

use App\Models\AssurerCour;
use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssurerCourController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'professor' => 'required|integer',
            'module' => 'required|integer',
            'element' => 'required|integer',
            'group' => 'required|string',
            'room' => 'required|integer',
            'beginning' => 'required|integer',
            'ending' => 'required|integer',
            'date' => 'required|date',
        ]);

        // Vérifier si la date existe déjà dans la table date
        $date = Date::firstOrCreate(['date' => $request->input('date')]);

        if ($date) {
            // Check if the room is available for the given time period
            $isRoomTaken = AssurerCour::where('id_salle', $request->input('room'))
                ->where('id_date', $date->id_date)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('id_heure_debut', [$request->input('beginning'), $request->input('ending')])
                        ->orWhereBetween('id_heure_fin', [$request->input('beginning'), $request->input('ending')])
                        ->orWhere(function ($query) use ($request) {
                            $query->where('id_heure_debut', '<', $request->input('beginning'))
                                ->where('id_heure_fin', '>', $request->input('ending'));
                        });
                })
                ->exists();

            if ($isRoomTaken) {
                return response()->json(['success' => false, 'message' => 'La salle n\'est pas disponible pour le moment'], 400);
            }

            // Création d'une nouvelle instance et stockage des données
            $assurerCour = new AssurerCour();
            $assurerCour->id_prof = $request->input('professor');
            $assurerCour->id_module = $request->input('module');
            $assurerCour->id_element = $request->input('element');
            $assurerCour->N_groupe = $request->input('group');
            $assurerCour->id_salle = $request->input('room');
            $assurerCour->id_heure_debut = $request->input('beginning');
            $assurerCour->id_heure_fin = $request->input('ending');
            $assurerCour->id_date = $date->id_date; // Use the id of the date record

            $assurerCour->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create or retrieve date'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'professor' => 'required|integer',
            'module' => 'required|integer',
            'element' => 'required|integer',
            'group' => 'required|string',
            'room' => 'required|integer',
            'beginning' => 'required|integer',
            'ending' => 'required|integer',
            'date' => 'required|date',
        ]);

        // Check if the date exists or create it
        $date = Date::firstOrCreate(['date' => $request->input('date')]);

        if ($date) {
            // Update the event in the database
            $affectedRows = DB::table('assurer_cours')
                ->where('id', $id)
                ->update([
                    'id_prof' => $request->input('professor'),
                    'id_module' => $request->input('module'),
                    'id_element' => $request->input('element'),
                    'N_groupe' => $request->input('group'),
                    'id_salle' => $request->input('room'),
                    'id_heure_debut' => $request->input('beginning'),
                    'id_heure_fin' => $request->input('ending'),
                    'id_date' => $date->id_date, // Use the id of the date record
                ]);

            if ($affectedRows > 0) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update event'], 500);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create or retrieve date'], 500);
        }
    }

    public function getEvents()
    {
        // Raw SQL query to fetch data from related tables
        $events = DB::select('
            SELECT
                ac.id,
                ac.id_prof,
                p.nom as prof_name,
                p.prenom as prof_prenom,
                ac.id_module,
                m.intitule as module_name,
                ac.id_element,
                e.intitule as element_name,
                ac.id_salle,
                s.num_salle as salle_name,
                ac.id_heure_debut,
                hd.heure_debut as heure_debut_time,
                ac.id_heure_fin,
                hf.heure_fin as heure_fin_time,
                ac.id_date,
                d.date as date_date,
                ac.N_groupe
            FROM
                assurer_cours ac
            LEFT JOIN
                personnel p ON ac.id_prof = p.id_personnel
            LEFT JOIN
                module m ON ac.id_module = m.id_module
            LEFT JOIN
                element e ON ac.id_element = e.id_element
            LEFT JOIN
                salle s ON ac.id_salle = s.id_salle
            LEFT JOIN
                heure_debut hd ON ac.id_heure_debut = hd.id_heure_debut
            LEFT JOIN
                heure_fin hf ON ac.id_heure_fin = hf.id_heure_fin
            LEFT JOIN
                date d ON ac.id_date = d.id_date
        ');

        // Format the data as needed for the frontend
        $events = collect($events)->map(function ($event) {
            return [
                'backgroundColor' => '#A5ECC1',
                'borderColor' => '#000',
                'id' => $event->id,
                'prof' => [
                    'id' => $event->id_prof,
                    'first_name' => $event->prof_name,
                    'last_name' => $event->prof_prenom,
                ],
                'module' => [
                    'id' => $event->id_module,
                    'name' => $event->module_name,
                ],
                'element' => [
                    'id' => $event->id_element,
                    'name' => $event->element_name,
                ],
                'salle' => [
                    'id' => $event->id_salle,
                    'name' => $event->salle_name,
                ],
                'heure_debut' => [
                    'id' => $event->id_heure_debut,
                    'time' => $event->heure_debut_time,
                ],
                'heure_fin' => [
                    'id' => $event->id_heure_fin,
                    'time' => $event->heure_fin_time,
                ],
                'date' => [
                    'id' => $event->id_date,
                    'date' => $event->date_date,
                ],
                'N_groupe' => $event->N_groupe,
            ];
        });

        return response()->json($events);
    }

}