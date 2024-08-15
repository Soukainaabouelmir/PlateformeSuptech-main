<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmploietudiantController extends Controller
{
    public function index(){
        $user = Auth::guard('etudient')->user();
        return view ('etudiant.views.emploietudiant');}
}
