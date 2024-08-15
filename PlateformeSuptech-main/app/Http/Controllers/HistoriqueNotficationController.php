<?php

namespace App\Http\Controllers;
use App\Models\seance;
use Illuminate\Http\Request;

class HistoriqueNotficationController extends Controller
{
    public function index()
    {
        $seances = seance::all();
        return view('scolarite.views.historiquenotification');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $seances = seance::where('nom_enseignant', 'like', "%$query%")
                              ->orWhere('Matiere', 'like', "%$query%")
                              ->orWhere('Groupe', 'like', "%$query%")
                              ->orWhere('Filiere', 'like', "%$query%")
                              ->orWhere('Niveau', 'like', "%$query%")
                              ->orWhere('Cycle', 'like', "%$query%")
                              ->paginate(10);
        return view('scolarite.views.historiquenotification', compact('seances'));
    }
}
