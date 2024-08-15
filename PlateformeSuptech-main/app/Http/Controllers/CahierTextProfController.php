<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CahierTextProfController extends Controller
{
    public function index()
    {
        return view('Prof.views.cahiertextprof');
    }
}
