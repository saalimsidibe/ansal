<?php

namespace App\Http\Controllers;

use App\Models\Candidat;

use Illuminate\Http\Request;

class Evaluateur extends Controller
{
    public function EvMedecine()

    {
        $medecins = Candidat::where('college', '3')->get();

        return view('evaluateurs.evaluateurmedecine')->with('medecins', $medecins);
    }

    public function showMedecin($id)
    {
        $medecin = Candidat::findOrFail($id);
        return view('informations.profilmedec')->with('medecin', $medecin);
    }

    public function EvLettre()
    {
        $litteraires = Candidat::where('college', '5')->get();
        return view('evaluateurs.evaluateurlettre')->with('litteraires', $litteraires);
    }

    public function EvAgricole()
    {
        $agronomes = Candidat::where('college', '4')->get();
        return view('evaluateurs.evaluateuragricole')->with('agronomes', $agronomes);
    }
    public function EvSciences()

    {
        $techniciens = Candidat::where('college', '1')->get();
        return view('evaluateurs.evaluateursciences')->with('techniciens', $techniciens);
    }

    public function EvEconomie()
    {
        $economistes = Candidat::where('college', '2')->get();
        return view('evaluateurs.evaluateureconomie')->with('economistes', $economistes);
    }
}
