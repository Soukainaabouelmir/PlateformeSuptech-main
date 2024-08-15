<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class EtudientLoginController extends Controller
{
    public function index()
    {
        return view('etudiant.views.etudient-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'CNE' => 'required|string', // assuming CNE is a string identifier
            'apogee' => 'required|string|min:6',
        ]);

        if (Auth::guard('etudient')->attempt(['CNE' => $request->CNE, 'apogee' => $request->apogee], $request->remember)) {
            return redirect()->intended(route('homeetudiant'));
        }

        return redirect()->back()->withInput($request->only('CNE', 'remember'))->withErrors([
            'CNE' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }
}
