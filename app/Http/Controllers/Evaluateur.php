<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Evaluateur extends Controller
{
    public function EvMedecine()
    {
        return view('evaluateurs.evaluateurmedecine');
    }

    public function EvLettre()
    {
        return view('evaluateurs.evaluateurlettre');
    }

    public function EvAgricole()
    {
        return view('evaluateurs.evaluateuragricole');
        
    }
    public function EvSciences()
    {
        return view('evaluateurs.evaluateursciences');
        
    }

    public function EvEconomie()
    {
        return view('evaluateurs.evaluateureconomie');
    }
    
}