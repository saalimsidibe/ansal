<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*

class AutreController extends Controller
{
    public function indexAu(Request $request)
    {
        $request->session()->put('stepAu', "1");

        return view('autrevues.etape1autre');
    }

    public function nextAu(Request $request)
    {
        $stepAu = $request->session()->get('stepAu');

        switch ($stepAu) {
            case 1:
                $validatedAuData = $request->validate([
                    'nomAutre' => 'required|string|max:255',
                    'prenomAutre' => 'required|string|max:255',
                    'sexeAu' => 'required|string|max:15|in:masculin,feminin',
                    'datenaissanceAutre' => 'required|date',
                    'titreAutre' => 'required|string|max:255',
                    'numerotelAutre' => 'required|string|max:15',
                    'emailAutre' => 'required|string|email|max:255',

                ]);

                $request->session()->put('data1Au', [
                    'nomAutre' => $validatedAuData['nomAutre'],
                    'prenomAutre' => $validatedAuData['prenomAutre'],
                    'sexeAu' => $validatedAuData['sexeAu'],
                    'datenaissanceAutre' => $validatedAuData['datenaissanceAutre'],
                    'titreAutre' => $validatedAuData['titreAutre'],
                    'numerotelAutre' => $validatedAuData['numerotelAutre'],
                    'emailAutre' => $validatedAuData['emailAutre']

                ]);

                $request->session()->put('stepAu', "2");
                return redirect()->route('etape2.autre');
                break;

            case 2:
                $validatedAuData = $request->validate([
                    'nomPremierPautre' => 'required|string|max:255',
                    'prenomPremierPautre' => 'required|string|max:255',
                    'nomDeuxiemePautre' => 'required|string|max:255',
                    'prenomDeuxiemePautre' => 'required|string|max:255',
                    'collegeAutre' => 'required|integer|in:1,2,3,4,5',
                    'specialiteAutre' => 'required|string|max:255',
                ]);

                //stocker les donnees en session
                $request->session()->put('data2Au', array_merge($request->session()->get('data2Au', []), $validatedAuData));

                $request->session()->put('stepAu', '3');
                return redirect()->route('etape3.autre');

                break;

            case 3:

                /* $validatedAuData = $request->validate([
                    'nomDipAu.*' => 'required|string|max:255',
                    'periodDipAu.*' => 'required|date',
                    'instituDipAu.*' => 'required|string|max:255',
                    'villeAu.*' => 'required|string|max:255',
                    'paysAu.*' => 'required|string|max:255',
                    'periodDipAu.*' => 'required|date',
                ]);
*/
                //   $request->session()->put('data3Au', array_merge($request->session()->get('data3Au', []), $validatedAuData));
              /*  $request->session()->put('stepAu', '4');
                return redirect()->route('etape4.autre');
                break;
        }
    }
}*/