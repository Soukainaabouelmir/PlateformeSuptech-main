<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accueil;
class AccueilLoginController extends Controller
{
    public function index()
    {
        
        return view('accueil.views.accueil_login');
    }

    public function login_accueil(Request $request)
    {
        $this->validate($request, [
            'nom_utilisateur' => 'required', 
            'cin_salarie' => 'required',
        ]);
    
        
        $user = Accueil::where('nom_utilisateur', $request->nom_utilisateur)
                        ->where('cin_salarie', $request->cin_salarie)
                        ->first();
    
        if ($user) {
            // Connecter manuellement l'utilisateur
            Auth::guard('accueil')->login($user, $request->remember);
    
            return redirect()->intended(route('homeacceuil'));
        }
    
        return redirect()->back()->withInput($request->only('nom_utilisateur', 'remember'))->withErrors([
            'nom_utilisateur' => 'Nom d\'utilisateur ou mot de passe invalide !',
        ])->with('error_class', 'text-red');
        
    }
    public function logout()
    {
        
        Auth::guard('accueil')->logout();
        return view('homelogin');
    }
}


