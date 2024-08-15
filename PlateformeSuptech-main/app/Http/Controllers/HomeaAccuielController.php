<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeaAccuielController extends Controller
{
    public function index()
    {
        return view('accueil.views.homeaccueil');
    }
    
}
