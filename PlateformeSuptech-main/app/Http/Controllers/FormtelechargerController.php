<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Element;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class FormtelechargerController extends Controller
{
    public function enregistrerCahierDeTexte(Request $request)
    {
        $request->validate([
            // Ajoutez les règles de validation ici
        ]);

        $donnees = $request->all();

        $hd = $request->input('hd');
        $hf = $request->input('hf');
        $date = $request->input('date_seance');
        $activite = $request->input('activite');

        $matiereExistante = Element::where('intitule', $donnees['matiere'])->first();
        if ($matiereExistante) {
            $donnees['num_element'] = $matiereExistante->num_element;
        }

        $groupeExistante = Groupe::where('intitule', $donnees['groupe'])->first();
        if ($groupeExistante) {
            $donnees['id_groupe'] = $groupeExistante->id_groupe;
        }

        $donnees['heure_depart'] = $hd;
        $donnees['heure_fin'] = $hf;
        $donnees['date_seance'] = $date;
        $donnees['objectif'] = $activite;

        Seance::create($donnees);

        return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès');
    }

    public function telechargerCahierDeTexte(Request $request)
{
    // Récupérer les données du formulaire
    $enseignantName = $request->input('enseignant');

    // Récupérer les données des séances depuis la base de données
    $seances = Seance::select(
        'seance.date_seance',
        'seance.heure_depart',
        'seance.heure_fin',
        'seance.objectif',
        'element.intitule as Matiere',
        'groupe.intitule as Groupe',
        'filiere.intitule as Filiere',
        'filiere.cycle as Cycle',
        'etablissement.ville as Etablissement'
    )
    ->join('element', 'element.num_element', '=', 'seance.num_element')
    ->join('groupe', 'groupe.id_groupe', '=', 'seance.id_groupe')
    ->join('filiere', 'filiere.id_filiere', '=', 'groupe.id_filiere')
    ->join('inscriptions', 'inscriptions.id_filiere', '=', 'filiere.id_filiere')
    ->join('etudient', 'etudient.apogee', '=', 'inscriptions.apogee')
    ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
    ->get();

    
    if ($seances->isEmpty()) {
        return redirect()->back()->with('error', 'Aucune séance trouvée.');
    }

    
    $contenu = "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Cahier de textes</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .seance {
                margin-bottom: 20px;
            }
            .info {
                margin-bottom: 10px;
            }
            .strong-label {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h1>CAHIER DE TEXTES</h1>
        <p>Enseignant: $enseignantName</p>
        <div>";

    // Ajouter les données des séances dans le contenu HTML
    foreach ($seances as $seance) {
        $contenu .= "<div class='seance'>
            <div class='info'>
                <p><span class='strong-label'>Cycle :</span> " . htmlspecialchars($seance->Cycle) . "</p>
                <p><span class='strong-label'>Filière :</span> " . htmlspecialchars($seance->Filiere) . "</p>
                <p><span class='strong-label'>Groupe :</span> " . htmlspecialchars($seance->Groupe) . "</p>
                <p><span class='strong-label'>Niveau :</span> " . htmlspecialchars($seance->Filiere) . "</p>
                <p><span class='strong-label'>Matière :</span> " . htmlspecialchars($seance->Matiere) . "</p>
            </div>
            <div class='info'>
                <p><span class='strong-label'>Enseignant :</span> " . htmlspecialchars($enseignantName) . "</p>
                <p><span class='strong-label'>Horaire :</span> " . htmlspecialchars($seance->heure_depart . ' - ' . $seance->heure_fin) . "</p>
                <p><span class='strong-label'>Date Séance :</span> " . htmlspecialchars($seance->date_seance) . "</p>
            </div>
            <p class='info'><span class='strong-label'>Activités objectifs de la séance :</span> " . htmlspecialchars($seance->objectif) . "</p>
        </div>";
    }

    // Fin du contenu HTML
    $contenu .= "</div></body></html>";
    dd($contenu);

    // Configuration de Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    // Initialisation de Dompdf
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($contenu);

    // Rendu du PDF
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Téléchargement du PDF
    return $dompdf->stream('Cahierdetextes.pdf');
}
}
