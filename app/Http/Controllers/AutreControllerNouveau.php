<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutreControllerNouveau extends Controller
{
    //

    public function etape1()
    {
        return view('autrevues.etape1autre');
    }

    public function validerEtape1(Request $request)
    {

        $donnees1 = $request->validate([
            'nomAutre' => 'required|string|max:255',
            'prenomAutre' => 'required|string|max:255',
            'sexeAu' => 'required|string|max:15|in:masculin,feminin',
            'datenaissanceAutre' => 'required|date',
            'titreAutre' => 'required|string|max:255',
            'numerotelAutre' => 'required|string|max:15',
            'emailAutre' => 'required|string|email|max:255',
        ]);

        $request->session()->put('etape1', $donnees1);

        return redirect()->route('etape2.autre');
    }

    public function validerEtape2(Request $request)
    {
        $donnees2 = $request->validate([
            'nomPremierPautre' => 'required|string|max:255',
            'prenomPremierPautre' => 'required|string|max:255',
            'nomDeuxiemePautre' => 'required|string|max:255',
            'prenomDeuxiemePautre' => 'required|string|max:255',
            'collegeAutre' => 'required|integer|in:1,2,3,4,5',
            'specialiteAutre' => 'required|string|max:255',

        ]);
        $request->session()->put('etape2', $donnees2);
        return redirect()->route('etape3.autre');
    }

    public function validerEtape3(Request $request)
    {
        $donnees3 = $request->validate([
            'diplomesAu.*.nom' => 'required|string|max:255',
            'diplomesAu.*.periode' => 'required|date',
            'diplomesAu.*.institut' => 'required|string|max:255',
            'diplomesAu.*.ville' => 'required|string|max:255',
            'diplomesAu.*.pays' => 'required|string|max:255',


        ]);
        $request->session()->put('etape3', $donnees3);

        return redirect()->route('etape4.autre');
    }

    public function validerEtape4(Request $request)
    {
        $donnees4 = $request->validate([
            'expadminAu' => 'required|string|in:oui,non',
            'fonctionsAAu.*.intitule' => 'required|string|max:255',
            'fonctionsAAu.*.debut' => 'required|date',
            'fonctionsAAu.*.fin' => 'required|date',
            'fonctionsAAu.*.structure' => 'required|string|max:255',
            'fonctionsAAu.*.ville' => 'required|string|max:255',
            'fonctionsAAu.*.pays' => 'required|string|max:255',
            'resAdau.*.intitule' => 'required|string|max:255',
            'resAdau.*.debut' => 'required|date',
            'resAdau.*.fin' => 'required|date',
            'resAdau.*.structure' => 'required|string|max:255',
            'resAdau.*.ville' => 'required|string|max:255',
            'resAdau.*.pays' => 'required|string|max:255',


        ]);

        $request->session()->put('etape4', $donnees4);

        return redirect()->route('etape5.autre');
    }

    public function validerEtape5(Request $request)
    {
        $donnees5 = $request->validate([
            'expprofintAu' => 'required|string|in:oui,non',
            'titles.*' => 'required|string|max:255',
            'starts.*' => 'required|date',
            'ends.*' => 'required|date',
            'foncsIau.*.intitule' => 'required|string|max:255',
            'foncsIau.*.structure' => 'required|string|max:255',
            'foncsIau.*.ville' => 'required|string|max:255',
            'foncsIau.*.pays' => 'required|string|max:255',
            'foncsIau.*.debut' => 'required|date',
            'foncsIau.*.fin' => 'required|date',




        ]);
        $request->session()->put('etape5', $donnees5);
        dd($request);
        return redirect()->route('etape6.autre');
    }

    public function validerEtape6(Request $request)
    {
        $donnees6 = $request->validate([
            'distinctionsAut' => 'required|in:honorifique,scientifique',
            'apportAu' => 'required|max:200',
            'honneurAu' => 'accepted',
            'titre.*' => 'required|string|max:255',
            'anneePublication.*' => 'required|date',
            'nomAuteur.*' => 'required|string|max:255',
            'nomCoauteur.*' => 'required|string|max:255',
            'editeur.*' => 'required|string|max:255',
            'nombrePage.*' => 'required|string|max:255',
            'titreNe.*' => 'required|string|max:255',
            'nomAuteurNe.*' => 'required|string|max:255',
            'nomCoauteurNe.*' => 'required|string|max:255',
            'distinctionsAu.*' => 'required|string|in:honorifique,scientifique',

        ]);
        $request->session()->put('etape6', $donnees6);
        return redirect()->route('etapefinale.autre');
    }
}
