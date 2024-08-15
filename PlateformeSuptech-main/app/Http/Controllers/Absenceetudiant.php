<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Absenceetudiant extends Controller
{
    public function index()
    {
        return view('scolarite.views.absenceetudiant');
    }
}
