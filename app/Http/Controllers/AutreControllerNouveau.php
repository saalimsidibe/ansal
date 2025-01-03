<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\CommissionChercheur;
use App\Models\Diplome;
use App\Models\Experience;
use App\Models\ExpProfChercheur;
use App\Models\Ouvrage;
use App\Models\Parrain;
use App\Models\Responsabilite;
use App\Models\Commission;
use App\Models\Brevet;
use App\Models\Article;
use App\Models\Distinction;
use App\Models\PreuveAutre;
use Illuminate\Support\Facades\Mail;
use App\Mail\AutreMail;
use Illuminate\Support\Facades\Session;

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
            'numerotelAutre' => 'required|string|regex:/^\d+$/|max:15',
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

        return redirect()->route('etapexautre');

        // return redirect()->route('etape4.autre');
    }

    public function validerEtapeX(Request $request)
    {
        $donneesX = $request->validate(
            [
                'travaux' => 'required|string|max:255',
                'implication' => 'required|string|max:255'
            ]

        );
        $request->session()->put('etapeX', $donneesX);


        return redirect()->route('etape4.autre');
    }

    public function validerEtape4(Request $request)
    {
        $donnees4 = $request->validate(
            [
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


            ],
           
        );

        $request->session()->put('etape4', $donnees4);


        return redirect()->route('etape5.autre');
    }

    public function validerEtape5(Request $request)
    {
        $donnees5 = $request->validate(
            [
                'expprofintAu' => 'required|in:oui,non',
                'respintAu' => 'required|in:oui,non',
                'experiences.*.functionTitle' => 'required|string|max:255',
                'experiences.*.startDate' => 'required|date',
                'experiences.*.endDate' => 'required|date',
                'experiences.*.structure' => 'required|string|max:255',
                'experiences.*.city' => 'required|string|max:255',
                'experiences.*.country' => 'required|string|max:255',

                'responsibilities.*.responsibilityTitle' => 'required|string|max:255',
                'responsibilities.*.startDate' => 'required|date',
                'responsibilities.*.endDate' => 'required|date',
                'responsibilities.*.country' => 'required|string|max:255',
                'responsibilities.*.city' => 'required|string|max:255',
                'responsibilities.*.structure' => 'required|string|max:255',



            ],
            [
                'experiences.*.functionTitle.max' => 'le nom de  de l\'expérience (numero:index) ne doit pas dépasser 255 caractères',
                'experiences.*.structure.max ' => 'le nom de la structure de l\'expérience (numero:index) ne doit pas dépasser 255 caractères',
                'experiences.*.city.max' => 'le nom de la ville de l\'expérience(numero:index) ne doit pas dépasser 255 caractères',
                'experiences.*.country.max' => 'le nom de l\'expérience(numero:index) ne doit pas dépasser 255 caractères',



                'responsibilities.*.responsibilityTitle.required' => 'le nom de la responsabilite (numero:index) est exigée',
                'responsibilities.*.startDate.required' => 'la début de la responsabilité(numero:index) est exigée',
                'responsibilities.*.endDate.required' => 'la fin de la responsabilité(numero:index) est exigée',
                'responsibilities.*.country.required' => 'le pays de la responsabilité(numero:index) est exigée',
                'responsibilities.*.city' => 'la ville de la responsabilité(numero:index) est exigée',


                'responsibilities.*.responsibilityTitle.max' => 'le nom de la responsabilité(numero:index) ne doit pas dépasser 255 caractères',
                'responsibilities.*.city.max' => 'la ville de la responsabilité(numero:index) ne doit pas dépasser 255 caractères',
                'responsibilities.*.country.max' => 'le pays de la responsabilité(numero:index) ne doit pas dépasser 255 caractères',

            ]
        );
        $request->session()->put('etape5', $donnees5);


        return redirect()->route('etape6.autre');
    }

    public function validerEtape6(Request $request)
    {
        $donnees6 = $request->validate([
            'commissionAu.*.nom' => 'required|string|max:255',
            'edites.*.titre' => 'required|string|max:255',
            'edites.*.anneePublication' => 'required|integer|digits:4', // Année de publication doit être une année valide
            'edites.*.nomAuteur' => 'required|string|max:255',
            'edites.*.nomCoauteur' => 'nullable|string|max:255', // Coauteur peut être optionnel
            'edites.*.editeur' => 'nullable|string|max:255',
            'edites.*.nombrePage' => 'nullable|integer|min:1', // Nombre de pages peut être optionnel mais doit être un nombre positif


            'Nedites.*.titreNe' => 'nullable|string|max:255',
            'Nedites.*.nomAuteurNe' => 'nullable|string|max:255',
            'Nedites.*.nomCoauteurNe' => 'nullable|string|max:255',
            'Nedites.*.nbrePNe' => 'required|string|max:255',
            'distinctionsAu.*.type' => 'nullable|in:honorifique,scientifique', // Valeur doit être l'une des options spécifiées
            //'distinctAu' => 'nullable|string|max:255',
            'distinctionsAu.*.distinctions_nom' => 'required|string|max:255',
            'distinctionsAu.*.distinctions_date' => 'required|string|max:255',
            'contribution' => 'nullable|string|max:255',
            'apportAu' => 'nullable|string|max:1000', // Limiter la taille du texte
            'honneurAu' => 'required|boolean',

        ]);
        $request->session()->put('etape6', $donnees6);

        return redirect()->route('etapefinale.autre');
    }


    public function sendFile(Request $request)
    {
        $validatedData = $request->validate([

            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'diplomes' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'justifications_professionnelles' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'commites' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'ouvrages' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'distinctions_honorifiques' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'distinctions_scientifiques' => 'nullable|file|mimes:pdf,doc,docx|max:20048'

        ]);

        foreach ($validatedData as $key => $file) {
            if ($request->hasFile($key)) {
                $path = $file->store('autres', 'public');

                $nom_originale = $file->getClientOriginalName();
                session()->push('documents', ['key' => $key, 'path' => $path, 'nom_originale' => $nom_originale]);
            }
        }
        //return response()->json(['success' => 'Fichiers téléchargés avec succès.']);

        return redirect()->route('resume');
    }



    public function finir(Request $request)
    {




        $d1 = session()->get('etape1');
        $d2 = session()->get('etape2');
        $d3 = session()->get('etape3');
        $d4 = session()->get('etape4');
        $d5 = session()->get('etape5');
        $d6 = session()->get('etape6');
        $dx = session()->get('etapeX');
        $documents = session('documents', []);
        $edites = $d6['edites'] ?? [];
        $Nedites = $d6['Nedites'] ?? [];
        $distinctions = $d6['distinctionsAu'] ?? [];


        try {
            // Création du candidat
            $candidat = new Candidat();
            $candidat->categorie = 'autre';
            $candidat->nom = $d1['nomAutre'];
            $candidat->prenom = $d1['prenomAutre'];
            $candidat->sexe = $d1['sexeAu'];
            $candidat->datenaissance = $d1['datenaissanceAutre'];
            $candidat->titre = $d1['titreAutre'];
            $candidat->telephone = $d1['numerotelAutre'];
            $candidat->email = $d1['emailAutre'];
            $candidat->college = $d2['collegeAutre'];
            $candidat->specialite = $d2['specialiteAutre'];
            $candidat->travauxSign = $dx['travaux'];
            $candidat->communautaire = $dx['implication'];
            $candidat->apport = $d6['apportAu'];
            $candidat->honneur = $d6['honneurAu'];
            $candidat->contribution = $d6['contribution'];
            $candidat->save();

            // Création du parrain
            $parrain = new Parrain();
            $parrain->nomPreParrain = $d2['nomPremierPautre'];
            $parrain->PrenomPreParrain = $d2['prenomPremierPautre'];
            $parrain->nomDeuxParrain = $d2['nomDeuxiemePautre'];
            $parrain->PrenomDeuxParrain = $d2['prenomDeuxiemePautre'];
            $parrain->candidat_id = $candidat->id;
            $parrain->save();

            // Création des diplômes
            if (isset($d3['diplomesAu'])) {
                foreach ($d3['diplomesAu'] as $dip) {
                    $diplome = new Diplome();
                    $diplome->nom_diplome = $dip['nom'];
                    $diplome->date_acquisition = $dip['periode'];
                    $diplome->nom_college = $dip['institut'];
                    $diplome->ville = $dip['ville'];
                    $diplome->pays = $dip['pays'];
                    $diplome->candidat_id = $candidat->id;
                    $diplome->save();
                }
            }


            // Création des expériences nationales
            if (isset($d4['fonctionsAAu'])) {
                foreach ($d4['fonctionsAAu'] as $ex) {
                    $exp = new Experience();
                    $exp->intitule = $ex['intitule'];
                    $exp->type = 'nationale';
                    $exp->structure = $ex['structure'];
                    $exp->debut = $ex['debut'];
                    $exp->fin = $ex['fin'];
                    $exp->ville = $ex['ville'];
                    $exp->pays = $ex['pays'];
                    $exp->candidat_id = $candidat->id;
                    $exp->save();
                }
            }


            // Création des responsabilités nationales
            if (isset($d4['resAdau'])) {
                foreach ($d4['resAdau'] as $resp) {
                    $responsabilite = new Responsabilite();
                    $responsabilite->intitule = $resp['intitule'];
                    $responsabilite->type = "nationale";
                    $responsabilite->debut = $resp['debut'];
                    $responsabilite->fin = $resp['fin'];
                    $responsabilite->structure = $resp['structure'];
                    $responsabilite->ville = $resp['ville'];
                    $responsabilite->pays = $resp['pays'];
                    $responsabilite->candidat_id = $candidat->id;
                    $responsabilite->save();
                }
            }


            // Création des expériences internationales
            if (isset($d5['experiences'])) {
                foreach ($d5['experiences'] as $ex) {
                    $exp = new Experience();
                    $exp->intitule = $ex['functionTitle'];
                    $exp->type = 'internationale';
                    $exp->structure = $ex['structure'];
                    $exp->debut = $ex['startDate'];
                    $exp->fin = $ex['endDate'];
                    $exp->ville = $ex['city'];
                    $exp->pays = $ex['country'];
                    $exp->candidat_id = $candidat->id;
                    $exp->save();
                }
            }


            // Création des responsabilités internationales
            if (isset($d5['responsibilities'])) {
                foreach ($d5['responsibilities'] as $resp) {
                    $responsabilite = new Responsabilite();
                    $responsabilite->intitule = $resp['responsibilityTitle'];
                    $responsabilite->type = "internationale";
                    $responsabilite->debut = $resp['startDate'];
                    $responsabilite->fin = $resp['endDate'];
                    $responsabilite->structure = $resp['structure'];
                    $responsabilite->ville = $resp['city'];
                    $responsabilite->pays = $resp['country'];
                    $responsabilite->candidat_id = $candidat->id;
                    $responsabilite->save();
                }
            }


            // Création des commissions
            if (isset($d6['commissionAu'])) {
                foreach ($d6['commissionAu'] as $comm) {
                    $commission = new Commission();
                    $commission->nom = $comm['nom'];
                    $commission->candidat_id = $candidat->id;
                    $commission->save();
                }
            }


            // Enregistrement des ouvrages non édités
            if (isset($Nedites)) {
                foreach ($Nedites as $Nedite) {
                    $ouvrage = new Ouvrage();
                    $ouvrage->nom = $Nedite['titreNe'];
                    $ouvrage->nom_auteur = $Nedite['nomAuteurNe'];
                    $ouvrage->nom_coauteur = $Nedite['nomCoauteurNe'];
                    $ouvrage->nombrePage = $Nedite['nbrePNe'];
                    $ouvrage->type = 'non edite';
                    $ouvrage->candidat_id = $candidat->id;
                    $ouvrage->save();
                }
            }


            // Enregistrement des ouvrages édités
            if (isset($edites)) {
                foreach ($edites as $edite) {
                    $ouvrage = new Ouvrage();
                    $ouvrage->nom = $edite['titre'];
                    $ouvrage->nom_auteur = $edite['nomAuteur'];
                    $ouvrage->nom_coauteur = $edite['nomCoauteur'];
                    $ouvrage->annee_publication = $edite['anneePublication'];
                    $ouvrage->nom_editeur = $edite['editeur'];
                    $ouvrage->nombrePage = $edite['nombrePage'];
                    $ouvrage->type = 'edite';
                    $ouvrage->candidat_id = $candidat->id;
                    $ouvrage->save();
                }
            }


            // Enregistrement des distinctions
            if (isset($distinctions)) {
                foreach ($distinctions as $distinction) {
                    $distinctionModel = new Distinction();
                    $distinctionModel->type = $distinction['type'];
                    $distinctionModel->nom = $distinction['distinctions_nom'];
                    $distinctionModel->date = $distinction['distinctions_date'];
                    $distinctionModel->candidat_id = $candidat->id;
                    $distinctionModel->save();
                }
            }



            if (isset($documents)) {


                foreach ($documents as $preuveAutre) {

                    if (is_array($preuveAutre)) {
                        $preuve = new PreuveAutre();
                        $preuve->chemin = $preuveAutre['path'];
                        $preuve->nom_originale = $preuveAutre['nom_originale'];
                        $preuve->candidat_id = $candidat->id;
                        $preuve->save();
                    }
                }
            }

            // (Décommenter si vous souhaitez enregistrer les preuves)
            /*
        foreach ($documents as $document) {
            $preuve = new PreuveAutre();
            $preuve->type = $document['key'];
            $preuve->chemin = $document['path'];
            $preuve->nom_originale = $document['nom_originale'];
            $preuve->candidat_id = $candidat->id;
            $preuve->save();
        }
        */
            Mail::to(session('etape1')['emailAutre'])->send(new AutreMail);
            $mail = session('etape1.emailAutre');
            Session::flush();
            // Redirection avec un message de succès
            return redirect()->route('resume')->with('message', ' Votre candidature a été enregistrée avec succès. Un mail de confirmation vous a été envoyé à l\'adresse ' . ' ' . $mail);
        } catch (\Exception $e) {
            // En cas d'erreur, redirection avec un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de votre candidature: ' . $e->getMessage());
        }
    }
}