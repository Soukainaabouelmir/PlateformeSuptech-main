<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class homeScolariteController extends Controller
{
   
public function index()
    {
        return view('scolarite.views.homescolarite');
    }
}
