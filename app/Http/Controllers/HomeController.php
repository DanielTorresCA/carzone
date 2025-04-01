<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auto;

class HomeController extends Controller
{
    public function index()
    {
        $autos = Auto::all();
        
        return view("home.index",compact('autos'));  
    }
}
