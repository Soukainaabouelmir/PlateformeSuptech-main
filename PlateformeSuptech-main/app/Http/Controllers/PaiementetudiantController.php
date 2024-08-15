<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Typepaiement;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaiementetudiantController extends Controller
{
    public function index()
    {
        $user = Auth::guard('etudient')->user();

        $inscription = DB::table('inscriptions')->where('apogee', $user->apogee)->first();
        $paidMonths = Paiement::where('apogee', $user->apogee)->pluck('mois_concerne')->toArray();
        $filiere = Filiere::where('id_filiere', $inscription->id_filiere)->first();
        $totalSchoolPayments = Paiement::where('apogee', $user->apogee)
                                   ->where('id_typepaiement', 1) // Assuming 1 is the type for school payments
                                   ->sum('montant');
                                   $bourse = DB::table('etudient_bourse')
                                   ->join('bourse', 'etudient_bourse.id_bourse', '=', 'bourse.id_bourse')
                                   ->where('etudient_bourse.apogee', $user->apogee)
                                   ->select('bourse.taux_bourse')
                                   ->first();
                       
                       $scholarshipPercentage = $bourse ? $bourse->taux_bourse : 0;
                       
                       
                       $schoolFeeAfterBourse = $filiere->cout_filiere * ((100 - $scholarshipPercentage) / 100);
                       $resteAPayer = $schoolFeeAfterBourse - $totalSchoolPayments;
        $paidMonthsInternat = Paiement::where('id_typepaiement', 2)->where('apogee', $user->apogee)->pluck('mois_concerne')->toArray();
        $paidMonthsTransport = Paiement::where('id_typepaiement', 4)->where('apogee', $user->apogee)->pluck('mois_concerne')->toArray();

        $resteAPayerInternat = $this->calculateResteAPayer($user->apogee, 2);
        $resteAPayerTransport = $this->calculateResteAPayer($user->apogee, 4);

        return view('etudiant.views.paiementetudiant', compact('user', 'inscription', 'paidMonths', 'filiere', 'paidMonthsInternat', 'paidMonthsTransport', 'resteAPayerInternat', 'resteAPayerTransport', 'resteAPayer'));
    }

    private function calculateResteAPayer($apogee, $typePaiement)
    {
        $totalCost = Typepaiement::where('id_typepaiement', $typePaiement)->sum('cout');
        $paidAmount = Paiement::where('id_typepaiement', $typePaiement)->where('apogee', $apogee)->sum('montant');

        return $totalCost - $paidAmount;
    }

    public function getPaidMonths(Request $request)
    {
        $user = Auth::guard('etudient')->user();
        $paidMonths = Paiement::where('apogee', $user->apogee)->pluck('mois_concerne');

        return response()->json(['paidMonths' => $paidMonths]);
    }

    public function paiementEtudiantshistorique(Request $request)
    {
        $user = Auth::guard('etudient')->user();
        $paiement = Paiement::where('apogee', $user->apogee)->select([
           'date_paiement', 'nom', 'prenom', 'n_telephone', 'Email', 'cni', 'montant', 'mois_concerne', 'mode_paiement', 'choix'
        ]);

        return DataTables::of($paiement)->make(true);
    }

    public function store(Request $request)
{
    $user = Auth::guard('etudient')->user();
    $moisEcole = $request->input('mois_concerne.ecole', []);
    $moisInternat = $request->input('mois_concerne.internat', []);
    $moisTransport = $request->input('mois_concerne.transport', []);

    // Vérifiez si un fichier d'image a été envoyé
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName(); // Obtenez le nom original du fichier
        $file->move(public_path('asset/images'), $fileName); // Déplacez le fichier vers le dossier de destination
    } else {
        $fileName = null; // Si aucun fichier n'a été téléchargé
    }

    // Enregistrer les paiements pour l'école
    foreach ($moisEcole as $mois) {
        Paiement::create([
            'apogee' => $user->apogee,
            'mois_concerne' => $mois,
            'id_typepaiement' => 1, // Ecole
            'montant' => $request->input('montant'),
            'date_paiement' => $request->input('date_paiement'),
            'id_modepaiement' => $request->input('id_modepaiement'),
            'id_filiere' => $request->input('id_filiere'),
            'image' => $fileName, // Stockez le nom du fichier dans la base de données
        ]);
    }

    // Enregistrer les paiements pour l'internat
    foreach ($moisInternat as $mois) {
        Paiement::create([
            'apogee' => $user->apogee,
            'mois_concerne' => $mois,
            'id_typepaiement' => 2, // Internat
            'montant' => $request->input('montant'),
            'date_paiement' => $request->input('date_paiement'),
            'id_modepaiement' => $request->input('id_modepaiement'),
            'id_filiere' => $request->input('id_filiere'),
            'image' => $fileName, // Stockez le nom du fichier dans la base de données
        ]);
    }

    // Enregistrer les paiements pour le transport
    foreach ($moisTransport as $mois) {
        Paiement::create([
            'apogee' => $user->apogee,
            'mois_concerne' => $mois,
            'id_typepaiement' => 4, // Transport
            'montant' => $request->input('montant'),
            'date_paiement' => $request->input('date_paiement'),
            'id_modepaiement' => $request->input('id_modepaiement'),
            'id_filiere' => $request->input('id_filiere'),
            'image' => $fileName, // Stockez le nom du fichier dans la base de données
        ]);
    }

    return redirect()->back()->with('success', 'Paiement enregistré avec succès');
}

}

