<?php

namespace App\Http\Controllers;

use App\Models\Etudians;
use Illuminate\Http\Request;

class LoginetudiantController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    if ($user->role === 'etudiant') {
        return redirect()->route('homeetudiant');
    } elseif ($user->role === 'scolarite') {
        return redirect()->route('homescolarite');
    } elseif ($user->role === 'accueil') {
        return redirect()->route('homeaccuiel');
    } elseif ($user->role === 'rh') {
        return redirect()->route('homeRH');
    } elseif ($user->role === 'prof') {
        return redirect()->route('homeprof');
    } elseif ($user->role === 'admin') {
        return redirect()->route('homeadmin');
    } else {
        // Handle other roles or errors
    }
}
public function homeetudiant()
{
    // Logic to retrieve data for the student dashboard
    // For example, fetching user-specific data, recent activities, etc.
    
    // You can pass any necessary data to the view
    $data = [
        'user' => auth()->user(), // Get the authenticated user
        // Add more data as needed
    ];

    // Return the view with the data
    return view('homeetudiant', $data);
}
}

