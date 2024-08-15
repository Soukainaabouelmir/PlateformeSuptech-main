<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamEtudiantController extends Controller
{
    public function index(){
        return view ('etudiant.views.exametudiant');
}
}