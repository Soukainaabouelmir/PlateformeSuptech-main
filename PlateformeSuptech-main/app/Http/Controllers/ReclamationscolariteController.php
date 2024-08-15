<?php

namespace App\Http\Controllers;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Log;
class ReclamationscolariteController extends Controller
{
  


    public function index()
    {
        $reclamation = Reclamation::paginate(10); 
        return view('scolarite.views.reclamationscolarite', compact('reclamation'));
    }
    public function reclamationEtudiants()
    {
        $reclamations = DB::table('reclamations')
        ->select([
            'reclamations.apogee',
            'reclamations.type_reclamation',
            'reclamations.description',
            'reclamations.file_reclamation',
            'etudient.Nom as etudiant_nom',
            'etudient.Prenom as etudiant_prenom',
            'filiere.intitule as filiere_intitule',
            'etudient.Email as etudiant_email',
            'etudient.telephone as etudiant_telephone',
           
        ])
        ->join('filiere', 'reclamations.id_filiere', '=', 'filiere.id_filiere')
        ->join('etudient', 'reclamations.apogee', '=', 'etudient.apogee');
       
    
    \Log::info($reclamations->toSql());

        return DataTables::of($reclamations)
            ->addColumn('file_reclamation', function ($reclamation) {
                // Si le fichier est une image
                if (strpos($reclamation->file_reclamation, '.jpg') !== false ||
                    strpos($reclamation->file_reclamation, '.jpeg') !== false ||
                    strpos($reclamation->file_reclamation, '.png') !== false ||
                    strpos($reclamation->file_reclamation, '.gif') !== false) {
                    // Retourner un lien vers l'image avec le nom du fichier
                    return '<a href="' . asset('asset/images/' . $reclamation->file_reclamation) . '" target="_blank">' . $reclamation->file_reclamation . '</a>';
                } else {
                    // Sinon, retourner simplement le nom du fichier avec un lien
                    return '<a href="' . asset('asset/images/' . $reclamation->file_reclamation) . '" target="_blank">' . $reclamation->file_reclamation . '</a>';
                }
            })
            ->rawColumns(['file_reclamation'])
            ->make(true);
    }
    
    
}

