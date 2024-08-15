<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudians;

class StudentController extends Controller
{
    public function index()
    {
        // Get all students initially with their payments
        $students = Etudians::with('paiements')->get();
        return view('admin.views.index', compact('students'));
    }

    public function filter(Request $request)
    {
        // Build the query based on the filters
        $query = Etudians::query();

        if ($request->has('etablissement') && !empty($request->etablissement)) {
            $query->where('Etablissement_bac', $request->etablissement);
        }
        if ($request->has('cycle') && !empty($request->cycle)) {
            $query->where('Cycle', $request->cycle);
        }
        if ($request->has('filiere') && !empty($request->filiere)) {
            $query->where('Filliere', $request->filiere);
        }
        if ($request->has('niveau') && !empty($request->niveau)) {
            $query->where('Niveau', $request->niveau);
        }
        if ($request->has('groupe') && !empty($request->groupe)) {
            $query->where('Groupe', $request->groupe);
        }
        if ($request->has('mois') && !empty($request->mois)) {
            // Ajouter un filtre pour le mois si nécessaire
        }
        if ($request->has('paiement') && !empty($request->paiement)) {
            $query->whereHas('paiements', function($q) use ($request) {
                $q->where('status', $request->paiement);
            });
        }

        // Execute the query and get the results
        $students = $query->with('paiements')->get();

        return response()->json(['students' => $students]);
    }
}
