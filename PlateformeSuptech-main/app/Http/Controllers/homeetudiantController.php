<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeetudiantController extends Controller
{
    public function index()
    {
        
        return view('etudiant.views.homeetudiant');
    }
}
