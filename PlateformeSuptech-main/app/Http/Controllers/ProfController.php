<?php
// app/Http/Controllers/ProfController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function index()
    {
        $profs = Prof::all(); // Fetch all professors
        $specialites = DB::table('specialite')->select('id_specialite', 'specialite')->get(); // Fetch all specialities with id and name
        return view('admin.views.indexp', compact('profs', 'specialites'));
    }

    public function data(Request $request)
    {
        $query = Prof::query();

        if ($request->has('matricule_cnss') && !empty($request->matricule_cnss)) {
            $query->where('matricule_cnss', $request->matricule_cnss);
        }
        if ($request->has('specialite') && !empty($request->specialite)) {
            $query->where('specialite', $request->specialite);
        }
        if ($request->has('type_contrat') && !empty($request->type_contrat)) {
            $query->where('type_contrat', $request->type_contrat);
        }
        if ($request->has('CIN') && !empty($request->CIN)) {
            $query->where('CIN', $request->CIN);
        }

        return DataTables::of($query)->make(true);
    }
}
