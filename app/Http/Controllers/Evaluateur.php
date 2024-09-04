<?php

namespace App\Http\Controllers;

use App\Models\Candidat;

use Illuminate\Http\Request;

class Evaluateur extends Controller
{
    public function EvMedecine()

    {
        $medecins = Candidat::where('college', '5');

        return view('evaluateurs.evaluateurmedecine')->with('medecins', $medecins);
    }

    public function showMedecin($id)
    {
        $medecin=Candidat::where('college','5');
        
    }

    public function EvLettre()
    {
        $litteraires = Candidat::where('college', '2');
        return view('evaluateurs.evaluateurlettre')->with('litteraires', $litteraires);
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