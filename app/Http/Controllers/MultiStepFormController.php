<?php
// app/Http/Controllers/MultiStepFormController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiStepFormController extends Controller
{
    public function index(Request $request)
    {

        $request->session()->put('step', "1");
        $request->session()->put('salim', [4, 2]);

        return view('multi-step-form.step1');
    }


    /**
     * Fonction  qui gère les avancement 
     */
    public function next(Request $request)
    {





        $step = $request->session()->get('step');

        switch ($step) {
            case 1:
                $request->session()->put('step', "2");
                /**
                 * controles des données envoyé et  et l'on stoc dabs la session
                 */

                $validatedData = $request->validate([
                    'nom' => 'required|string|max:255',
                    'prenom' => 'required|string|max:255',
                    // Ajoutez ici les règles de validation pour les autres champs
                ]);

                // Stockage des données validées dans la session
                $request->session()->put('data1', [
                    'nom' => $validatedData['nom'],
                    'prenom' => $validatedData['prenom'],
                    // Ajoutez ici les autres données de la première étape
                ]);
                return view('multi-step-form.step2');
                break;
            case 2:
                $request->session()->put('step', "3");
                return view('multi-step-form.step3');
                break;
            case 3:
                echo "i égal 2";
                break;
        }
    }

    /***
     * fonction qui gère les recul
     */

    public function previous(Request $request)
    {


        /*  $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            // Ajoutez ici les règles de validation pour les autres champs
        ]);

        // Stockage des données validées dans la session
         $request->session()->put('step_data', [
            'nom' => $validatedData['nom'],
            'prenoms' => $validatedData['prenoms'],
            // Ajoutez ici les autres données de la première étape
        ]);

*/

        $step = $request->session()->get('step_data');

        switch ($step) {
            case 1:
                $request->session()->put('step_data', "2");
                return view('multi-step-form.step1');

                break;
            case 2:
                $request->session()->put('step_data', "1");
                return view('multi-step-form.step1');
                break;
            case 3:
                echo "i égal 2";
                break;
        }
    }


    // app/Http/Controllers/MultiStepFormController.php

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'titre' => 'required|string|max:255',
            'tel_mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Traitez les données validées ici (par exemple, sauvegardez-les en base de données)

        // Redirigez l'utilisateur vers une page de confirmation ou une autre étape du processus
    }
}
