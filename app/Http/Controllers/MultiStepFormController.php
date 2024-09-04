<?php
// app/Http/Controllers/MultiStepFormController.php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\CommissionChercheur;
use App\Models\Diplome;
use App\Models\Experience;
use App\Models\ExpProfChercheur;
use App\Models\Ouvrage;
use App\Models\Parrain;
use App\Models\ParrainChercheur;
use App\Models\Responsabilite;
use Illuminate\Http\Request;
use  App\Models\Commission;
use  App\Models\Brevet;
use App\Models\Article;
use App\Models\Distinction;
use App\Models\PreuveChercheur;
use Illuminate\Support\Facades\DB;

class MultiStepFormController extends Controller
{
    public function index(Request $request)
    {

        $request->session()->put('step', "1");
        // $request->session()->put('salim', [4, 2]);

        return view('chercheurvues.etape1chercheur');
    }


    /**
     * Fonction  qui gère les avancement
     */
    public function next(Request $request)
    {

        $step = $request->session()->get('step');
        //dd($step);

        switch ($step) {
            case 1:

                /**
                 * controles des données envoyé et  et l'on stoc dabs la session
                 */
                //dd($step);

                $validatedData = $request->validate([
                    'nom' => 'required|string|max:255',
                    'prenom' => 'required|string|max:255',
                    'sexe' => 'required|string|max:15|in:feminin,masculin',
                    'datenaiss' => 'required|date',
                    'titre' => 'required|integer|in:1,2,3,4,5',
                    // 'datenomin' => 'required|date', // Décommentez cette ligne si ce champ est nécessaire
                    'numerotel' => 'required|string|max:15', // Limite de longueur typique pour un numéro de téléphone
                    'email' => 'required|string|email|max:255',
                    'expertise' => 'required|string|max:255'

                    // Ajoutez ici les règles de validation pour les autres champs
                ]);
                ///  dd($step);

                // Stockage des données validées dans la session
                $request->session()->put('data1', [
                    'nom' => $validatedData['nom'],
                    'prenom' => $validatedData['prenom'],
                    'nom' => $validatedData['nom'],
                    'prenom' => $validatedData['prenom'],
                    'sexe' => $validatedData['sexe'],
                    'datenaiss' => $validatedData['datenaiss'],
                    'titre' => $validatedData['titre'],
                    'datenomin' => $request['datenomin'],
                    'numerotel' => $validatedData['numerotel'],
                    'email' => $validatedData['email'],
                    'expertise' => $validatedData['expertise']

                ]);

                $request->session()->put('step', "2");
                return redirect()->route('etape2chercheur');
                break;
            case 2:


                $validatedData = $request->validate([
                    'nomPremierP' => 'required|string|max:255',
                    'prenomPremierP' => 'required|string|max:255',
                    'nomDeuxiemeP' => 'required|string|max:255',
                    'prenomDeuxiemeP' => 'required|string|max:255',
                    'college' => 'required|integer|in:1,2,3,4,5',
                    'specialite' => 'required|string|max:255',
                ]);

                // Stocker les données en session
                $request->session()->put('data2', array_merge($request->session()->get('data2', []), $validatedData));

                // Rediriger vers l'étape suivante ou finaliser
                $request->session()->put('step', "3"); //

                return redirect()->route('etape3chercheur');
                break;
            case 3:
                $validatedData = $request->validate([
                    'diplomes.*.intitule' => 'required|string|max:255',
                    'diplomes.*.periode' => 'required|date|max:255',
                    'diplomes.*.institution' => 'required|string|max:255',
                    'diplomes.*.ville' => 'required|string|max:255',
                    'diplomes.*.pays' => 'required|string|max:255',
                ]);

                // Stocker les données en session
                $request->session()->put('data3', array_merge($request->session()->get('data3', []), $validatedData));

                // Rediriger vers l'étape suivante
                $request->session()->put('step', "4"); //

                return redirect()->route('etape4chercheur');
                break;
            case 4:
                $validatedData = $request->validate([
                    'expadmin' => 'required|string|max:5|in:oui,non',
                    'respadmin' => 'required|string|max:5|in:oui,non',
                    'experiences.*.intitule' => 'required|string|max:255',
                    'experiences.*.debut' => 'required|string|max:255',
                    'experiences.*.fin' => 'required|string|max:255',
                    'experiences.*.ville' => 'required|string|max:255',
                    'experiences.*.structure' => 'required|string|max:255',
                    'responsabilites.*.intitule' => 'required|string|max:255',
                    'responsabilites.*.debut' => 'required|string|max:255',
                    'responsabilites.*.fin' => 'required|string|max:255',
                    'responsabilites.*.ville' => 'required|string|max:255',
                    'responsabilites.*.structure' => 'required|string|max:255'
                ]);
                //  dd($validatedData);

                // Stocker les données en session
                $request->session()->put('data4', array_merge($request->session()->get('data4', []), $validatedData));

                // Rediriger vers l'étape suivante
                $request->session()->put('step', "5 "); //
                return redirect()->route('etape5chercheur');
                break;
            case 5:

                $validatedData = $request->validate([
                    'expprofint' => 'required|string|in:oui,non',
                    'experiences.*.intitule' => 'required_if:expprofint,oui|string|max:255',
                    'experiences.*.debut' => 'required_if:expprofint,oui|date|max:255',
                    'experiences.*.fin' => 'required_if:expprofint,oui|date|max:255',


                    'experiences.*.institution' => 'required_if:expprofint,oui|string|max:255',
                    'experiences.*.pays' => 'required_if:expprofint,oui|string|max:255',
                    'experiences.*.ville' => 'required_if:expprofint,oui|string|max:255',

                    'respprofint' => 'required|string|in:oui,non',
                    'responsabilites.*.intitule' => 'required_if:respprofint,oui|string|max:255',
                    'responsabilites.*.debut' => 'required_if:respprofint,oui|date',
                    'responsabilites.*.fin' => 'required_if:respprofint,oui|date',
                    'responsabilites.*.ville' => 'required_if:respprofint,oui|string|max:255',
                    'responsabilites.*.pays' => 'required_if:respprofint,oui|string|max:255',
                    'responsabilites.*.institution' => 'required_if:respprofint,oui|string|max:255',
                ]);

                $request->session()->put('data5', array_merge($request->session()->get('data5', []), $validatedData));

                $request->session()->put('step', "6");
                return redirect()->route('etape6chercheur');
                break;

            case 6:
                $validatedData = $request->validate([
                    //'commissions.*' => 'nullable|string|max:255',
                    'commissions.*.name' => 'nullable|string|max:255',
                    'brevets.*.date' => 'nullable|date',
                    'brevets.*.auteur' => 'nullable|string|max:255',
                    'brevets.*.reference' => 'nullable|string|max:255',
                    'brevets.*.intitule' => 'nullable|string|max:255',
                    'contributionChecheur' => 'nullable|string|max:1000',
                    'distinctions.*.type' => 'nullable|integer|in:1,2',
                    'distinctions.*.nom' => 'nullable|string|max:255',
                    'distinctions.*.date' => 'nullable|date',
                    'ouvrages.*.auteur' => 'required|string|max:255',
                    'ouvrages.*.annee' => 'required|date', // Validation pour une année de publication valide
                    'ouvrages.*.titre' => 'required|string|max:255',
                    'ouvrages.*.editeur' => 'required|string|max:255',
                    'ouvrages.*.coauteur' => 'nullable|string|max:255',
                    'ouvrages.*.nombre_pages' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'articles.*.auteur' => 'required|string|max:255',
                    'articles.*.coauteur' => 'nullable|string|max:255', // Coauteur peut être nullable si non obligatoire
                    'articles.*.annee_publication' => 'required|date', // Validation pour une année de publication valide
                    'articles.*.titre' => 'required|string|max:255',
                    'articles.*.editeur' => 'required|string|max:255',
                    'articles.*.pages' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'honneurChercheur' => 'required',
                ]);

                /*  $validatedData = $request->validate([
                    'commissions.*' => 'required|string|max:255', // Le champ "name" n'est pas nécessaire ici puisque la valeur est directement dans l'array
                    'brevets.*' => 'required|string|max:255', // Assurez-vous que le champ brevets est bien une chaîne de caractères et que chaque élément est bien en string
                    'brevets.*.date' => 'required|date', // La date doit être validée comme un format de date
                    'brevets.*.intitule' => 'required|string|max:255',
                    'brevets.*.reference' => 'required|string|max:255',
                    'ouvrages.*.auteur' => 'required|string|max:255',
                    'ouvrages.*.annee' => 'required|integer|min:1900|max:' . date('Y'), // Validation pour une année de publication valide
                    'ouvrages.*.titre' => 'required|string|max:255',
                    'ouvrages.*.editeur' => 'required|string|max:255',
                    'ouvrages.*.nombre_page' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'articles.*.auteur' => 'required|string|max:255',
                    'articles.*.coauteur' => 'nullable|string|max:255', // Coauteur peut être nullable si non obligatoire
                    'articles.*.annee_publication' => 'required|integer|min:1900|max:' . date('Y'), // Validation pour une année de publication valide
                    'articles.*.titre' => 'required|string|max:255',
                    'articles.*.editeur' => 'required|string|max:255',
                    'articles.*.pages' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'distinctions.*.type' => 'required|string|in:1,2', // Correction pour s'assurer que le type est parmi les valeurs acceptées
                    'distinctions.*.nom' => 'required|string|max:255',
                    'distinctions.*.date' => 'required|date', // Doit être une date valide
                    'honneurChercheur' => 'required|boolean', // Validation en tant que booléen
                    'contributionChecheur' => 'required|string|max:255'
                ]); */


                //  dd($request);

                $request->session()->put('step', "7");
                $request->session()->put('data6', array_merge($request->session()->get('data6', []), $validatedData));

                return redirect()->route('etape7chercheur');
                break;
            case 7:
                // dd($request);
                try {
                    /* $validatedData = $request->validate([
                        'cvchercheurDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'dipChercheurDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'fonctionDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'societeExpertDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'brevetDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'articleDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'ouvrageDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'distinctionsHonorifiquesDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'distinctionsScientifiquesDoc' => 'required|file|mimes:pdf,doc,docx|max:2048'
                    ]);

                    $filePaths = [];

                    foreach ($validatedData as $key => $file) {
                        if ($request->hasFile($key)) {
                            $path = $file->store('temporary_files');
                            $filePaths[$key] = $path;
                        }
                    }

                    session(['filePaths' => $filePaths]);*/
                    $request->session()->put('step', "8");

                    return redirect()->route('multi-step-form.summary');
                } catch (\Exception $e) {
                    return back()->withErrors(['error' => $e->getMessage()]);
                }
                break;

            case 8:

                // $request->session()->put('salim', [4, 2]);

                return view('chercheurvues.summary');
                break;
            default:
                $request->session()->put('step', "1");
                // $request->session()->put('salim', [4, 2]);

                return view('chercheurvues.etape1chercheur');
                break;
        }
    }

    /*
     * fonction qui gère les recul
     */

    public function previous(Request $request)
    {



        $step = $request->session()->get('step');

        switch ($step) {
            case 1:
                $request->session()->put('step', "1");
                return redirect()->route('multi-step-form');

                break;
            case 2:
                $request->session()->put('step', "1");
                return redirect()->route('multi-step-form');;
                break;
            case 3:
                $request->session()->put('step', "2");
                return redirect()->route('etape2chercheur');;
                break;
            case 4:
                $request->session()->put('step', "3");
                return redirect()->route('etape3chercheur');;
                break;
            case 5:
                $request->session()->put('step', "4");
                return redirect()->route('etape4chercheur');;
                break;
            case 6:
                $request->session()->put('step', "5");
                return redirect()->route('etape5chercheur');
                break;
            case 7:
                $request->session()->put('step', "6");
                return redirect()->route('etape6chercheur');
                break;
        }
    }


    public function uploadFile(Request $request)
    {
        $validatedData = $request->validate([
            'cvchercheurDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'dipChercheurDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'fonctionDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'societeExpertDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'brevetDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'articleDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'ouvrageDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'distinctionsHonorifiquesDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'distinctionsScientifiquesDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        /*  foreach ($validatedData as $key => $file) {
            if ($request->hasFile($key)) {
                $path = $file->store('uploads');
                session()->push('uploaded_files', ['key' => $key, 'path' => $path]);
            }
        }

        return response()->json(['success' => 'File uploaded successfully.']); */

        foreach ($validatedData as $key => $file) {
            if ($request->hasFile($key)) {
                $path = $file->store('uploads');
                $type = $key;
                $nom_originale = $file->getClientOriginalName();
                session()->push('preuves_chercheurs', ['key' => $key, 'path' => $path, 'type' => $type, 'nom_originale' => $nom_originale]);
            }
        }

        return response()->json(['success' => 'File uploaded successfully.']);
    }



    // app/Http/Controllers/MultiStepFormController.php

    public function finish(Request $request)
    {
        //  DB::beginTransaction();

        // try {
        // Récupération des données de la session
        $data1 = session('data1'); //step1
        $data2 = session('data2'); //step2
        $data3 = session('data3'); //step3
        $data4 = session('data4'); //step4
        $data5 = session('data5'); //step5
        $data6 = session('data6'); //step6
        $files = session('preuves_chercheurs'); // Pour les fichiers uploadés



        // Exemple d'enregistrement dans la base de données
        //  $candidat = new Candidat();

        // $candidat->nom = $data1['nom'];
        // $candidat->prenom = $data1['prenom'];
        // $candidat->sexe = $data1['sexe'];
        //$candidat->datenaissance = $data1['datenaiss'];
        //$candidat->titre = $data1['titre'];
        //$candidat->telephone = $data1['numerotel'];
        //$candidat->datenomin = $data1['datenomin'];
        //$candidat->email = $data1['email'];
        //$candidat->college = $data2['college'];
        //$candidat->specialite = $data2['specialite'];
        //  $candidat->expertise = $data1['expertise'];
        //  $candidat->honneur = $data1['honneur'];

        //  $candidat->save();

        $candidat = new Candidat();
        $candidat->categorie = 'chercheur';
        $candidat->nom = $data1['nom'];
        $candidat->prenom = $data1['prenom'];
        $candidat->sexe = $data1['sexe'];
        $candidat->datenaissance = $data1['datenaiss'];
        $candidat->titre = $data1['titre'];
        $candidat->telephone = $data1['numerotel'];
        $candidat->datenomin = $data1['datenomin'];
        $candidat->email = $data1['email'];
        $candidat->college = $data2['college'];
        $candidat->specialite = $data2['specialite'];
        $candidat->expertise = $data1['expertise'];
        $candidat->honneur = 'valide';
        $candidat->contribution = $data6['contributionChecheur'];

        $candidat->save();



        $parrain = new Parrain();
        $parrain->nomPreParrain = $data2['nomPremierP'];
        $parrain->PrenomPreParrain = $data2['prenomPremierP'];
        $parrain->nomDeuxParrain = $data2['nomDeuxiemeP'];
        $parrain->PrenomDeuxParrain = $data2['prenomDeuxiemeP'];
        $parrain->candidat_id = $candidat->id;

        $parrain->save();


        foreach ($data3['diplomes'] as $key => $dip) {
            $diplome = new Diplome();
            $diplome->nom_diplome = $dip['intitule'];
            $diplome->date_acquisition = $dip['periode'];
            $diplome->nom_college = $dip['institution'];
            $diplome->ville = $dip['ville'];
            $diplome->pays = $dip['pays'];
            $diplome->candidat_id = $candidat->id;
            $diplome->save();
        }

        foreach ($data4['experiences'] as $key => $ex) {
            $exp = new Experience();
            $exp->intitule = $ex['intitule'];
            $exp->type = 'nationale';
            $exp->structure = $ex['structure'];;
            $exp->debut = $ex['debut'];
            $exp->fin = $ex['fin'];
            $exp->ville = $ex['ville'];
            $exp->pays = 'Burkina Faso';
            $exp->candidat_id = $candidat->id;
            $exp->save();
        }



        foreach ($data4['responsabilites'] as $key => $resp) {
            $responsabilite = new Responsabilite();
            $responsabilite->intitule = $resp['intitule'];
            $responsabilite->type = "nationale";
            $responsabilite->debut = $resp['debut'];
            $responsabilite->fin = $resp['fin'];
            $responsabilite->structure = $resp['structure'];
            $responsabilite->ville = $resp['ville'];
            $responsabilite->pays = 'Burkina Faso';
            $responsabilite->candidat_id = $candidat->id;
            $responsabilite->save();
        }

        foreach ($data5['experiences'] as $key => $ex) {
            $exp = new Experience();
            $exp->intitule = $ex['intitule'];
            $exp->type = 'internationale';
            $exp->structure = $ex['institution'];
            $exp->debut = $ex['debut'];
            $exp->fin = $ex['fin'];
            $exp->ville = $ex['ville'];
            $exp->pays = $ex['pays'];
            $exp->candidat_id = $candidat->id;
            $exp->save();
        }

        foreach ($data5['responsabilites'] as $key => $resp) {
            $responsabilite = new Responsabilite();
            $responsabilite->intitule = $resp['intitule'];
            $responsabilite->type = "internationale";
            $responsabilite->debut = $resp['debut'];
            $responsabilite->fin = $resp['fin'];
            $responsabilite->structure = $resp['institution'];
            $responsabilite->ville = $resp['ville'];
            $responsabilite->pays = $resp['pays'];
            $responsabilite->candidat_id = $candidat->id;
            $responsabilite->save();
        }

        foreach ($data6['commissions'] as $key => $comm) {
            $commission = new Commission();
            $commission->nom = $comm['name'];
            $commission->candidat_id = $candidat->id;
            $commission->save();
        }

        foreach ($data6['brevets'] as $key =>  $brev) {
            $brevet = new Brevet();
            $brevet->auteurs = $brev['auteur'];
            $brevet->date = $brev['date'];
            $brevet->intitule = $brev['intitule'];
            $brevet->ref = $brev['reference'];
            $brevet->candidat_id = $candidat->id;
            $brevet->save();
        }

        foreach ($data6['ouvrages'] as $key => $ouvr) {
            $ouvrage = new Ouvrage();
            $ouvrage->nom = $ouvr['titre'];
            $ouvrage->nom_auteur = $ouvr['auteur'];
            $ouvrage->nom_coauteur = $ouvr['coauteur'];
            $ouvrage->annee_publication = $ouvr['annee'];
            $ouvrage->nom_editeur = $ouvr['editeur'];
            $ouvrage->nombrePage = $ouvr['nombre_pages'];
            $ouvrage->type = "édité";
            $ouvrage->candidat_id = $candidat->id;

            $ouvrage->save();
        }

        foreach ($data6['articles'] as $key => $art) {
            $article = new Article();
            $article->auteur = $art['auteur'];
            $article->datePub = $art['annee_publication'];
            $article->titre = $art['titre'];
            $article->editeur = $art['editeur'];
            $article->refPage = $art['pages'];
            # $article->coauteur = $art['coauteur'];
            $article->candidat_id = $candidat->id;

            $article->save();
        }





        /*'distinctions.*.type' => 'nullable|integer|in:1,2',
                    'distinctions.*.nom' => 'nullable|string|max:255',
                    'distinctions.*.date' => 'nullable|date',
    */
        foreach ($data6['distinctions'] as $key => $dist) {
            $distinction = new Distinction();
            $distinction->nom = $dist['nom'];
            $distinction->type = $dist['type'];
            $distinction->date = $dist['date'];
            $distinction->candidat_id = $candidat->id;

            $distinction->save();
        }


        // les données du step2
        /*
        $parrainChercheur = new ParrainChercheur();
        $parrainChercheur->prenomPremierP = $data2['prenomPremierP'];
        $parrainChercheur->nomPremierP = $data2['nomPremierP'];
        $parrainChercheur->prenomDeuxiemeP = $data2['prenomDeuxiemeP'];
        $parrainChercheur->nomDeuxiemeP = $data2['nomDeuxiemeP'];
        $parrainChercheur->college = $data2['college'];
        $parrainChercheur->specialite = $data2['specialite'];
        $parrainChercheur->candidat_id = $candidat->id;
        $parrainChercheur->save();
*/

        // les données du step3
        /*
        foreach ($data3['diplomes'] as $key => $dip) {
            $diplome = new Diplome();
            $diplome->nom_diplome = $dip['intitule'];
            $diplome->date_acquisition = $dip['periode'];
            $diplome->nom_college = $dip['institution'];
            $diplome->ville = $dip['ville'];
            $diplome->pays = $dip['pays'];
            $diplome->candidat_id = $candidat->id;
            $diplome->save();
        }*/

        // les données du step4
        /*

        foreach ($data4['experiences'] as $key => $ex) {
            $exp = new ExpProfChercheur();
            $exp->intitule = $ex['intitule'];
            $exp->debut = $ex['debut'];
            $exp->fin = $ex['fin'];
            $exp->ville = $ex['ville'];
            $exp->candidat_id = $candidat->id;
            $exp->save();
        }
*/
        // les données du step5
        /*
        foreach ($data4['responsabilites'] as $key => $resp) {
            $responsabilite = new Responsabilite();
            $responsabilite->intitule = $resp['intitule'];
            $responsabilite->type = "resp['type']";
            $responsabilite->debut = $resp['debut'];
            $responsabilite->fin = $resp['fin'];
            $responsabilite->structure = $resp['structure'];
            $responsabilite->ville = $resp['ville'];
            $responsabilite->pays = $resp['ville'];
            $responsabilite->candidat_id = $candidat->id;
            $responsabilite->save();
        }*/
        /*

        foreach ($data5['experiences'] as $key => $expint) {
            $experience = new  ExpProfChercheur();
            $experience->intitule = $expint['intitule'];
            $experience->debut = $expint['debut'];
            $experience->type = 'internationale';
            $experience->ville = $expint['ville'];
            $experience->pays = $expint['pays'];
            $experience->structure = $expint['structure'];
            $experience->candidat_id = $candidat->id;
            $experience->save();
        }
           */
        /*     foreach ($data5['responsabilites'] as $key => $respint) {
            $responsabilite = new Responsabilite();
            $responsabilite->type = 'internationale';
            $responsabilite->debut = $respint['debut'];
            $responsabilite->fin = $respint['fin'];
            $responsabilite->structure = $respint['structure'];
            $responsabilite->ville = $respint['ville'];
            $responsabilite->pays = $respint['pays'];
            $responsabilite->candidat_id = $candidat->id;
            $experience->save();

            }
           */

        /*        foreach ($data6['commissions'] as $key => $comm) {
            $CommissionChercheur = new CommissionChercheur();
            $CommissionChercheur->Comm = $comm['name'];
            $CommissionChercheur->candidat_id = $candidat->id;
             }
           */










        /*

        foreach ($data6['ouvrages'] as $key => $ouvrage) {
            $ouvragesChercheur = new Ouvrage();
            $ouvragesChercheur->nom =
                $ouvragesChercheur->nom_auteur =
                $ouvragesChercheur->nom_coauteur =
                $ouvragesChercheur->annee_publication =
                $ouvragesChercheur->nom_editeur =
                $ouvragesChercheur->nombrePage =
                $ouvragesChercheur->candidat_id = $candidat->id;
        }

        */
        // Sauvegarde des fichiers si nécessaire
        /*  if (isset($files['cvchercheurDoc'])) {
                $cvPath = $files['cvchercheurDoc']->store('cv_docs');
                $candidat->cv_path = $cvPath;
            }
            if (isset($files['dipChercheurDoc'])) {
                $diplomaPath = $files['dipChercheurDoc']->store('diploma_docs');
                $candidat->diploma_path = $diplomaPath;
            }*/
        // Continuez pour les autres fichiers...

        // Enregistrement de l'objet dans la base de données


        // Suppression des données de session après enregistrement
        // session()->forget(['data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'files']);

        //  DB::commit(); // Commit de la transaction


        foreach ($files as $file) {
            $preuve = new PreuveChercheur();
            $preuve->type = $file['key'];
            $preuve->chemin = $file['path'];
            $preuve->nom_originale = $file['nom_originale'];
            $preuve->candidat_id = $candidat->id;

            $preuve->save();
        }

        return view('chercheurvues.summary')->with('success', 'Données enregistrées avec succès!');
        /*} catch (\Exception $e) {
         //   DB::rollBack(); // Rollback en cas d'erreur
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de l\'enregistrement.']);
        }*/
    }
}