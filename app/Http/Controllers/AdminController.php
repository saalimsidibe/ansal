<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function indexstats()

    {
        $scientifiques = count(DB::table('candidats')->where('college', '1')->get());
        $economies = count(DB::table('candidats')->where('college', '2')->get());
        $medecins = count(DB::table('candidats')->where('college', '3')->get());
        $agronomes = count(DB::table('candidats')->where('college', '4')->get());
        $comms = count(DB::table('candidats')->where('college', '5')->get());
        return view('admin.statistiques')->with([
            'scientifiques' => $scientifiques,
            'economies' => $economies,
            'medecins' => $medecins,
            'agronomes' => $agronomes,
            'comms' => $comms
        ]);
    }

    public function candidature()
    {
        return view('admin.candidature');
    }

    public function medecine_stats()
    {
        return view('admin.statistiques.medecine_statistiques');
    }

    public function st_stats()
    {
        return view('admin.statistiques.st_statistiques');
    }

    public function economie_pol_stats()
    {
        return view('admin.statistiques.economique_politique_statistiques');
    }

    public function agronomie_stats()
    {
        return view('admin.statistiques.agronome_statistiques');
    }

    public function lettre_stats()
    {
        return view('admin.statistiques.lettre_statistiques');
    }



    public function filtrerAgronomes(Request $request)
    {
        $categorie = $request->input('categorie');
        $sexe = $request->input('sexe');



        /*   $query = DB::table('candidats')->where('college', '4');

        if ($categorie) {
            $query->where('categorie', $categorie);
        }

        if ($sexe) {
            $query->where('sexe', $sexe);
        }

        $agro = $query->get();
        return response()->json($agro);
        */



        $candidats = Candidat::query();

        if ($categorie) {
            $candidats->where('categorie', $categorie);
        }

        if ($sexe) {
            $candidats->where('sexe', $sexe);
        }

        $candidats = $candidats->get();

        if ($candidats->isEmpty()) {
            return response()->json(['message' => 'Aucun candidat trouvé pour ce filtre.'], 404);
        }

        return response()->json($candidats);
    }
}