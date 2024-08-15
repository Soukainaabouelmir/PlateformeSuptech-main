<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Etudians;
use App\Models\Filiere;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class DemandeetudiantController extends Controller
{
    public function index(){
        $user = Auth::guard('etudient')->user();
        $inscription = DB::table('inscriptions')->where('apogee', $user->apogee)->first();
        $filiere = Filiere::where('id_filiere', $inscription->id_filiere)->first();
        
        return view ('etudiant.views.demandetudiant',compact('user','filiere','inscription'));}
        public function indexx(){
            $user = Auth::guard('etudient')->user();
    
            
            return view ('etudiant.views.demandenotification');}

        public function enregistrerDemande(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
       //name
       'apogee' => 'required',
       
       'filiere' => 'required',
       'semestre' => 'required',
       'Numero' => 'required',
       'Email' => 'required|email',
       'Type' => 'required',
      
        ]);

        // Création d'une nouvelle réclamation
        $demande = new Demande();
        $demande->apogee = $request->apogee;
        
         $demande->filiere = $request->filiere;
         $demande->semestre = $request->semestre;
         $demande->Numero = $request->Numero;
         $demande->Email = $request->Email;
        $demande->Type = $request->Type;
       
        // Enregistrement de la réclamation dans la base de données
        $demande->save();

        return redirect()->route('demande')->with('success', 'Demande enregistrée avec succès.');
        
    }
  
   
    public function espace()
    {
        // Récupérer l'étudiant authentifié
        $etudiant = Auth::guard('etudient')->user();

        // Récupérer les demandes validées pour cet étudiant en chargeant les documents associés
        $demandes = Demande::where('apogee', $etudiant->apogee)
                                   ->where('status', 'validé')
                                   ->with('document')
                                   ->with('etudient') // Charger la relation document
                                   ->get();
                                 
        return view('etudiant.views.demandenotification', compact('demandes'));
    }
    

    public function store(Request $request)
    {
       
        // Valider les données entrantes
        $request->validate([
            'apogee' => 'required|exists:etudient,apogee',
            'id_filiere' => 'required',
            'date_demande' => 'required',
           'id_document' => 'required|exists:document_admin,id_document',
        ]);

        // Créer une nouvelle demande
        Demande::create([
            'apogee' => $request->input('apogee'),
            'id_filiere' => $request->input('id_filiere'),
            'id_document' => $request->input('id_document'),
            'date_demande' => $request->input('date_demande'),
        ]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Demande enregistrée avec succès.');
    }

    public function demandeEtudiants(Request $request)
    {
        $user = Auth::guard('etudient')->user();
        
        // Récupérer les demandes de l'étudiant connecté
        $demandes = Demande::join('etudient', 'demandes_etudiant.apogee', '=', 'etudient.apogee')
        ->join('document_admin', 'demandes_etudiant.id_document', '=', 'document_admin.id_document')
        ->where('demandes_etudiant.apogee', $user->apogee)
        ->select([
            'etudient.Nom',
            'etudient.Prenom',
            'demandes_etudiant.id_document',
            'document_admin.description as document_description',
            DB::raw("IF(demandes_etudiant.status IS NULL, 'Demande en cours', demandes_etudiant.status) as EtatDemande"),
            'demandes_etudiant.created_at as DateDemande',
            'demandes_etudiant.motif_rejet as Motif'
        ])
        ->get();
    
        return DataTables::of($demandes)->make(true);
    }
    

}

