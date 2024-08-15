<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        Carbon::setLocale('fr');
        // Fetch the events from the database
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

        // Get the start and end of the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Filter events for the current week
        $weekEvents = collect($events)->filter(function ($event) use ($startOfWeek, $endOfWeek) {
            $date = Carbon::parse($event->date_date);
            return $date->between($startOfWeek, $endOfWeek);
        });

        // Format the data as needed for the frontend
        $formattedEvents = $weekEvents->map(function ($event) {
            return [
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

        // dd($formattedEvents);
        // die;

        // Generate the PDF
        $pdf = PDF::loadView('Admin.views.calender_pdf', ['events' => $formattedEvents]);

        return $pdf->download('calendar_weekend.pdf');
    }
}