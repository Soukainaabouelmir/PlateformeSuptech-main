<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteProfController extends Controller
{
    public function index()
    {
        
        return view('prof.views.noteprof');
    }
}
