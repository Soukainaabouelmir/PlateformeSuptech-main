<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class DemandeScolariteController extends Controller
{
    public function index()
    {
        $demande = Demande::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.demandescolarite', compact('demande'));
    }



   public function fetchDemandes()
   {
       $demandes = DB::table('demandes_etudiant')
           ->select([
               'demandes_etudiant.apogee',
               'etudient.Prenom as etudiant_prenom',
               'etudient.Email as etudiant_email',
               'etudient.telephone as etudiant_telephone',
               'demandes_etudiant.id_filiere',
               'demandes_etudiant.id_document',
               'etudient.Nom as etudiant_nom',
               'filiere.intitule as filiere_intitule',
               'document_admin.description as document_description'
           ])
           ->join('etudient', 'demandes_etudiant.apogee', '=', 'etudient.apogee')
           ->join('filiere', 'demandes_etudiant.id_filiere', '=', 'filiere.id_filiere')
           ->join('document_admin', 'demandes_etudiant.id_document', '=', 'document_admin.id_document');
   
       \Log::info($demandes->toSql()); // Log the SQL query
       \Log::info($demandes->get());   // Log the query results
   
       return DataTables::of($demandes)
           ->addColumn('actions', function($demande) {
               // Définir les URLs pour valider, archiver, rejeter et télécharger
               $validateUrl = route('demandes.valider', $demande->apogee);
               $archiveUrl = route('demandes.archiver', $demande->apogee);
               $rejectUrl = route('demandes.rejeter', $demande->apogee);
               $downloadUrl = route('demandes.download', ['apogee' => $demande->apogee, 'type' => $demande->document_description]);
   
               // Générer les boutons avec le modal pour rejeter
               return '<div style="display: flex; gap: 5px;">
                           <form id="validate-form-' . $demande->apogee . '" action="' . $validateUrl . '" method="POST" style="margin: 0;">
                               ' . csrf_field() . '
                               <button type="button" class="btn" onclick="confirmValidation(' . $demande->apogee . ')" style="width:auto; background-color:green; color:#fff;">Validé</button>
                           </form>
                           <form id="archive-form-' . $demande->apogee . '" action="' . $archiveUrl . '" method="POST" style="margin: 0;">
                               ' . csrf_field() . '
                               <button type="button" class="btn" onclick="confirmArchive(' . $demande->apogee . ')" style="width:auto; background-color:gray; color:#fff;">Archivé</button>
                           </form>
                           <button type="button" class="btn" data-toggle="modal" data-target="#rejectModal" data-apogee="' . $demande->apogee . '" style="width:auto; background-color:red; color:#fff;">Rejeter</button>
                           <a href="' . $downloadUrl . '" class="btn" style="width:auto; background-color:blue; color:#fff;">Télécharger</a>
                       </div>';
           })
           ->rawColumns(['actions']) // Ensure the HTML is not escaped
           ->make(true);
   }
   
   
    
//------------------------------------------------------------//
   
public function download(Request $request, $apogee)
{
    $type = $request->query('type'); // Récupérer le type de demande depuis la requête

    $demande = DB::table('demandes_etudiant')
        ->select([
            'demandes_etudiant.apogee',
            'etudient.Prenom as etudiant_prenom',
            'etudient.Email as etudiant_email',
            'etudient.telephone as etudiant_telephone',
            'demandes_etudiant.id_filiere',
            'demandes_etudiant.id_document',
            'etudient.Nom as etudiant_nom',
            'etudient.Date_naissance as etudiant_date_naissance',
            'etudient.Adresse as etudiant_adresse',
            'filiere.intitule as filiere_intitule',
            'filiere.duree as filiere_duree',
            'document_admin.description as document_description'
        ])
        ->join('etudient', 'demandes_etudiant.apogee', '=', 'etudient.apogee')
        ->join('filiere', 'demandes_etudiant.id_filiere', '=', 'filiere.id_filiere')
        ->join('document_admin', 'demandes_etudiant.id_document', '=', 'document_admin.id_document')
        ->where('demandes_etudiant.apogee', $apogee)
        ->first();

    if (!$demande) {
        return redirect()->back()->with('error', 'Demande non trouvée.');
    }

    // Journaliser la description du document
    \Log::info('Description du document: ' . $demande->document_description);

    // Initialiser dompdf
    $options = new Options();
    $options->set('defaultFont', 'Helvetica');
    $dompdf = new Dompdf($options);

    $pdf = null;
    $view = '';
    $imagePath = public_path('asset/images/logo.webp');
    $imageData = base64_encode(file_get_contents($imagePath));
    $imageSrc = 'data:image/webp;base64,' . $imageData;

    
    $description = strtolower(trim($demande->document_description));

   
    \Log::info('Description normalisée: ' . $description);

    
    if ($description == strtolower('Attestation Inscription')) {
        $view = View::make('scolarite.views.attestation', ['demande' => $demande])->render();
    } elseif ($description == strtolower('Relevé de Note')) {
        $view = View::make('scolarite.views.releve', ['demande' => $demande])->render();
    }

    if ($view) {
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();

        return response()->stream(
            function () use ($output) {
                echo $output;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="demande_' . $apogee . '.pdf"',
            ]
        );
    }

    return redirect()->back()->with('error', 'Type de demande invalide.');
}


    public function destroy($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->delete();

        return redirect()->back()->with('success', 'Demande supprimée avec succès.');
    }

    public function valider($apogee, Request $request)
    {
        $demande = Demande::where('apogee', $apogee)->firstOrFail();
        
        // Marquer la demande comme validée
        $demande->status = 'validé';
        $demande->message = true; // Indiquer que la notification a été envoyée
        $demande->save();

        return redirect()->back()->with('success', 'Demande validée et étudiant notifié.');
    }

    public function archiver($apogee, Request $request)
    {
        $demande = Demande::where('apogee', $apogee)->firstOrFail();
        
        // Marquer la demande comme archivée
        $demande->archive = true;
        $demande->save();
    
        return redirect()->back()->with('success', 'Demande archivée.');
    }
    public function rejeter(Request $request, $apogee)
{
    $request->validate([
        'motif_rejet' => 'required|string|max:255',
    ]);

    $demande = Demande::where('apogee', $apogee)->firstOrFail();
    
    // Marquer la demande comme rejetée
    $demande->status = 'rejeté';
    $demande->motif_rejet = $request->motif_rejet; // Enregistrer le motif du rejet
    $demande->save();

    return redirect()->back()->with('success', 'Demande rejetée avec le motif: ' . $request->motif_rejet);
}

}
