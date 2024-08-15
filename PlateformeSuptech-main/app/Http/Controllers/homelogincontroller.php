<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homelogincontroller extends Controller
{
    public function index()
    {
        
        return view('homelogin');
    }
}
