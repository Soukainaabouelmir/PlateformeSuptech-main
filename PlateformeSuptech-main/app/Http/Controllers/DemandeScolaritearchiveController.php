<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DemandeScolaritearchiveController extends Controller
{
    public function index()
    {
        return view('scolarite.views.archivedemande');
    }

    public function demandeEtudiants(Request $request)
    {
        $demandeQuery = Demande::select(['apogee','filiere','semestre','Numero','Email','Type'])
            ->where('archive', true); // Filtrer les demandes archivées

        return DataTables::of($demandeQuery)
        ->addIndexColumn()
            ->addColumn('Nom', function($demande) {
                return $demande->etudient ? $demande->etudient->Nom : '';
            })
            ->addColumn('Prenom', function($demande) {
                return $demande->etudient ? $demande->etudient->Prenom : '';
            })
            ->addColumn('actions', function($demande) {
                // Aucun bouton à afficher dans cette colonne car nous n'affichons que les demandes archivées
                return '';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
