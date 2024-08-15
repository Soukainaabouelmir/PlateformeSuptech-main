<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scolarite;
class ScolariteLoginController extends Controller
{
    public function index()
    {
        
        return view('scolarite.views.scolarite_login');
    }

    public function login_scolarite(Request $request)
    {
        $this->validate($request, [
            'mail' => 'required', 
            'mail' => 'required',
        ]);
    
        
        $user = Scolarite::where('mail', $request->mail)
                        ->where('mail', $request->mail)
                        ->first();
    
        if ($user) {
            // Connecter manuellement l'utilisateur
            Auth::guard('scolarite')->login($user, $request->remember);
    
            return redirect()->intended(route('homescolarite'));
        }
    
        return redirect()->back()->withInput($request->only('mail', 'remember'))->withErrors([
            'mail' => 'Nom d\'utilisateur ou mot de passe invalide !',
        ])->with('error_class', 'text-red');
        
    }
    public function logout()
    {
        
        Auth::guard('scolarite')->logout();
        return view('homelogin');
    }
}
