<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudians;

class EtudiantLoginController extends Controller
{
    public function index()
    {
        return view('etudiant.views.etudient-login');
    }

    public function login_etudient(Request $request)
{
    $this->validate($request, [
        'CNE' => 'required', 
        'apogee' => 'required',
    ]);

    
    $user = Etudians::where('CNE', $request->CNE)
                    ->where('apogee', $request->apogee)
                    ->first();

    if ($user) {
        // Connecter manuellement l'utilisateur
        Auth::guard('etudient')->login($user, $request->remember);

        return redirect()->intended(route('homeetudiant'));
    }

    return redirect()->back()->withInput($request->only('CNE', 'remember'))->withErrors([
        'CNE' => 'Nom d\'utilisateur ou mot de passe invalide !',
    ])->with('error_class', 'text-red');
    
}
public function logout()
{
    
    Auth::guard('etudient')->logout();
    return redirect()->route('etudient.login');
}
}