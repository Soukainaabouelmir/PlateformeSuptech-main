<?php

namespace App\Http\Controllers;
use App\Models\Seance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class HistoriqueprofController extends Controller
{
    
    
    public function index()
    {
        $seance = seance::paginate(10); 
        return view('Prof.views.historiqueprof',compact('seance'));}
    public function fetchHistorique()
    {
       
    $seances = Seance::with(['element', 'groupe.filiere.inscription'])
            ->select([
                'num_seance',
                'date_seance',
                'heure_depart',
                'objectif',
                'heure_fin',
                'num_element', 
                'id_groupe',   
            ]);

            return DataTables::of($seances)
            ->addColumn('element', function($seance) {
                return $seance->element ? $seance->element->intitule : '';
            })
            ->addColumn('groupe', function($seance) {
                return $seance->groupe ? $seance->groupe->intitule : '';
            })
            ->addColumn('filiere', function($seance) {
                return $seance->groupe && $seance->groupe->filiere ? $seance->groupe->filiere->intitule : '';
            })
            ->addColumn('niveau', function($seance) {
                return $seance->groupe && $seance->groupe->filiere->inscription->isNotEmpty() ? $seance->groupe->filiere->inscription->first()->niveau : '';
            })
            ->make(true);
    }
}
    
