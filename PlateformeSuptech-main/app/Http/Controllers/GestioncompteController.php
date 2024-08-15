<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\RH;
use App\Models\Role;
use App\Models\User;

class GestioncompteController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('Admin.views.gestioncomptes',[
            'roles' => $roles
        ]);
    }
    public function indexx()
    {
        
        return view('Admin.views.navtemplate');
    }
    public function indexxx()
    {
        
        return view('Admin.views.cc');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id; // Correcting role handling
        $user->password = Hash::make($request->password); // Hashing the password

        $user->save();

        return redirect()->back()->with('success', 'Un nouveau compte a été ajoutée');
    }
}
