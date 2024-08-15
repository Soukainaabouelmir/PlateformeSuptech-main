<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmploiaccueilController extends Controller
{
    public function index(){
        
        return view ('accueil.views.emploiaccueil');}
}
