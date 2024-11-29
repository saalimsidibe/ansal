<?php

namespace App\Http\Controllers;

use App\Models\Candidat;

use Illuminate\Http\Request;

class Evaluateur extends Controller
{

    public function showCandidat($id)
    {
        $candidat = Candidat::findOrFail($id);
        switch ($candidat->college) {
            case 1:
                $candidat->college_libelle="Sciences et Techniques";
                break;
            case 2:
                $candidat->college_libelle="Sciences juridiques, politiques, économiques et de gestion ";
                break;
            case 3:
                 $candidat->college_libelle="Sciences de la Santé Humaine et Animale";
                break;
            case 4:
                $candidat->college_libelle="Sciences Naturelles et Agricoles";
                break;
            case 5:
                $candidat->college_libelle="Sciences humaines, arts, lettres et culture ";
                break;

            default:
                $candidat->college_libelle="Non Défini";
                break;
        }
        return view('informations.profilcandidat')->with('candidat', $candidat);
    }

    public function EvCandidat($col)

    {
        $candidats = Candidat::where('college', $col)->get();

        switch ($col) {
            case 1:
                $college_libelle="Sciences et Techniques";
                break;
            case 2:
                $college_libelle="Sciences juridiques, politiques, économiques et de gestion ";
                break;
            case 3:
                 $college_libelle="Sciences de la Santé Humaine et Animale";
                break;
            case 4:
                $college_libelle="Sciences Naturelles et Agricoles";
                break;
            case 5:
                $college_libelle="Sciences humaines, arts, lettres et culture ";
                break;

            default:
                $college_libelle="Non Défini";
                break;
        }

        return view('evaluateurs.evaluateurcandidat')->with('candidats', $candidats)->with('college_libelle',$college_libelle);
    }

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