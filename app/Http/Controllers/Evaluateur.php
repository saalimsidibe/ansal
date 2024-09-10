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

    public function showLettre($id)
    {
        $litteraire = Candidat::findOrFail($id);
        return view('informations.profillitteraire')->with('litteraire', $litteraire);
    }

    public function EvAgricole()
    {
        $agronomes = Candidat::where('college', '4')->get();
        return view('evaluateurs.evaluateuragricole')->with('agronomes', $agronomes);
    }

    public function showAgronome($id)
    {
        $agronome = Candidat::findOrFail($id);
        return view('informations.profilagronome')->with('agronome', $agronome);
    }
    public function EvSciences()

    {
        $techniciens = Candidat::where('college', '1')->get();
        return view('evaluateurs.evaluateursciences')->with('techniciens', $techniciens);
    }

    public function showSciences($id)
    {
        $technicien = Candidat::findOrFail($id);
        return view('informations.profilst')->with('technicien', $technicien);
    }

    public function EvEconomie()
    {
        $economistes = Candidat::where('college', '2')->get();
        return view('evaluateurs.evaluateureconomie')->with('economistes', $economistes);
    }

    public function showEconomie($id)
    {
        $economiste = Candidat::findOrFail($id);
        return view('informations.profilecono')->with('economiste', $economiste);
    }

    public function EvAdmin()
    {
        $candidats = Candidat::all();
        return view('evaluateurs.evaluateuradmin')->with('candidats', $candidats);
    }

    public function showProfil($id)
    {
        $candidat = Candidat::findOrFail($id);
        return view('informations.profiladmin')->with('candidat', $candidat);
    }
}