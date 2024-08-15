<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('Admin.views.admin_login');
    }

    public function login_admin(Request $request)
    {
        $request->validate([
            'nom_utilisateur' => 'required',
            'mot_pass' => 'required',
        ]);

        $user = Admin::where('nom_utilisateur', $request->nom_utilisateur)
        ->where('mot_pass', $request->mot_pass)
        ->first();
    
    if ($user) {
    // Connecter manuellement l'utilisateur
    Auth::guard('admin')->login($user, $request->remember);
    
    return redirect()->intended(route('homeadmin'));
    }

        return back()->withErrors([
            'nom_utilisateur' => 'Nom d\'utilisateur ou mot de passe invalide!',
        ])->withInput($request->only('nom_utilisateur', 'remember'));
    }
    



    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
