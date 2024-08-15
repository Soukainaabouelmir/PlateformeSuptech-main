<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prof;
class ProfLoginController extends Controller
{
    public function index()
    {
        
        return view('prof.views.prof_login');
    }
    public function login_prof(Request $request)
    {
        $this->validate($request, [
            'matricule_cnss' => 'required', 
            'cin_salarie' => 'required',
        ]);
    
        
        $user = Prof::where('matricule_cnss', $request->matricule_cnss)
                        ->where('cin_salarie', $request->cin_salarie)
                        ->first();
    
        if ($user) {
            // Connecter manuellement l'utilisateur
            Auth::guard('prof')->login($user, $request->remember);
    
            return redirect()->intended(route('homeprof'));
        }
    
        return redirect()->back()->withInput($request->only('matricule_cnss', 'remember'))->withErrors([
            'matricule_cnss' => 'Nom d\'utilisateur ou mot de passe invalide !',
        ])->with('error_class', 'text-red');
        
    }
    public function logout()
    {
        
        Auth::guard('prof')->logout();
        return view('homelogin');
    }
}




