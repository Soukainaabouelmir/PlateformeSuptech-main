<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeRHController extends Controller
{
    public function index()
{
    return view('RH.views.homerh');
}
}
