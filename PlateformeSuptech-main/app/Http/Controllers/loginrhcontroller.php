<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginrhcontroller extends Controller
{
    public function index()
    {
        
        return view('RH.views.rh_login');
    }
}
