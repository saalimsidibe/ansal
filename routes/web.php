   <?php

    use App\Http\Controllers\AutreController;
    use App\Http\Controllers\AutreControllerNouveau;
    use Illuminate\Support\Facades\Route;
    use App\Livewire\ChercheurEtape as LivewireChercheurEtape;
    use App\Http\Controllers\MultiStepFormController;
    use App\Livewire\Etape1;
    use App\Http\Controllers\EvaluatorController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\Evaluateur;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\FileController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/apropos', function () {
        return view('apropos');
    });
    Route::get('/formulaires', function () {
        return view('formulaires');
    })->name('formulaire');
    Route::get('/contact', function () {
        return view('contact');
    });


    Route::middleware('auth')->group(function () {
        Route::view('/admin', 'admin');
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register']);

        Route::get('/evaluateur_candidat/{col}', [Evaluateur::class, 'EvCandidat'])->name('evaluateur.candidat');
        Route::get('/evaluateur_admin', [Evaluateur::class, 'EvAdmin'])->name('evaluateur.admin');

        Route::get('/profil/{id}', [Evaluateur::class, 'showProfil'])->name('profil.admin');
        Route::get('/profilcandidat/{id}', [Evaluateur::class, 'showCandidat'])->name('profil.candidat');
    });
    /*Route::get('/evaluateur_medecine', [Evaluateur::class, 'EvMedecine'])->name('evaluateur.medecine');

Route::get('/evaluateur_lettre', [Evaluateur::class, 'EvLettre'])->name('evaluateur.litterature');

Route::get('/evaluateur_agricole', [Evaluateur::class, 'EvAgricole'])->name('evaluateur.agricole');

Route::get('/evaluateur_sciences', [Evaluateur::class, 'EvSciences'])->name('evaluateur.sciences');

Route::get('/evaluateur_economie', [Evaluateur::class, 'EvEconomie'])->name('evaluateur.economie');


*/
    /*
Route::get('/profilmedecin/{id}', [Evaluateur::class, 'showMedecin'])->name('profil.medecin');

Route::get('/profillitteraire/{id}', [Evaluateur::class, 'showLettre'])->name('profil.litteraire');

Route::get('/profilagronome/{id}', [Evaluateur::class, 'showAgronome'])->name('profil.agronome');

Route::get('/profilsciences/{id}', [Evaluateur::class, 'showSciences'])->name('profil.sciences');

Route::get('/profileconomie/{id}', [Evaluateur::class, 'showEconomie'])->name('profil.economie');

*/





    Route::post('/multi-step-form/upload', [MultiStepFormController::class, 'uploadFile'])->name('multi-step-form.upload');
    Route::view('/formulaire', 'formulaires')->name('formulaire');
    Route::get('/etape1chercheur', [MultiStepFormController::class, 'index'])->name('multi-step-form');

    Route::post('/multi-step-form/store', [MultiStepFormController::class, 'store'])->name('multi-step-form.store');
    Route::post('/multi-step-form/next', [MultiStepFormController::class, 'next'])->name('multi-step-form.next');
    Route::get('/multi-step-form/previous', [MultiStepFormController::class, 'previous'])->name('multi-step-form.previous');
    //Route::post('/autre/next', [AutreController::class, 'nextAu'])->name('autre.next');



    Route::view('/chercheur', 'chercheur')->name('chercheur');

    Route::view('/etape1autre', 'autrevues.etape1autre')->name('etape1.autre');
    Route::view('/etape2autre', 'autrevues.etape2autre')->name('etape2.autre');
    Route::view('/etape3autre', 'autrevues.etape3autre')->name('etape3.autre');
    Route::view('/etape4autre', 'autrevues.etape4autre')->name('etape4.autre');
    Route::view('/etape5autre', 'autrevues.etape5autre')->name('etape5.autre');
    Route::view('/etape6autre', 'autrevues.etape6autre')->name('etape6.autre');
    Route::view('/etapefinaleautre', 'autrevues.etapefinaleautre')->name('etapefinale.autre');

    //Route::get('/multi-step-form', LivewireChercheurEtape::class)->name('multi-step-form');
    Route::view('/etape1chercheur', 'chercheurvues.etape1chercheur')->name('etape1chercheur');
    Route::view('/etape2chercheur', 'chercheurvues.etape2chercheur')->name('etape2chercheur');
    Route::view('/etape3chercheur', 'chercheurvues.etape3chercheur')->name('etape3chercheur');
    Route::view('/etape4chercheur', 'chercheurvues.etape4chercheur')->name('etape4chercheur');
    Route::view('/etape5chercheur', 'chercheurvues.etape5chercheur')->name('etape5chercheur');
    Route::view('/etape6chercheur', 'chercheurvues.etape6chercheur')->name('etape6chercheur');
    Route::view('/etape7chercheur', 'chercheurvues.etape7chercheur')->name('etape7chercheur');
    Route::view('/summary', 'chercheurvues.summary')->name('multi-step-form.summary');
    Route::post('/finish', [MultiStepFormController::class, 'finish'])->name('multi-step-form.finish');
    Route::view('/Accueil', 'accueil')->name('accueil');
    Route::view('/resume', 'autrevues.summaryautre')->name('resume');
    Route::view('/criterespecifique', 'critereSpecifique')->name('specifique');
    Route::view('/economie', 'criterevues.economie')->name('economie');
    Route::view('/litterature', 'criterevues.litterature')->name('litterature');
    Route::view('/sante', 'criterevues.sante')->name('sante');
    Route::view('/sciencesnat', 'criterevues.sciencesnat')->name('agro');
    Route::view('/st', 'criterevues.sciencestechniques')->name('sciencestech');
    Route::view('/implicationAutre', 'autrevues.etapexautre')->name('etapexautre');

    Route::post('/send-file', [AutreControllerNouveau::class, 'sendFile'])->name('file.send');

    Route::post('/finir', [AutreControllerNouveau::class, 'finir'])->name('AutreControllerNouveau.finir');

    Route::get('/etape1au', [AutreControllerNouveau::class, 'etape1']);
    Route::post('/etape1au', [AutreControllerNouveau::class, 'validerEtape1'])->name('valider1.autre');
    Route::post('/etap2au', [AutreControllerNouveau::class, 'validerEtape2'])->name('valider2.autre');
    Route::post('/etape3au', [AutreControllerNouveau::class, 'validerEtape3'])->name('valider3.autre');
    Route::post('/etapecontriau', [AutreControllerNouveau::class, 'validerEtapeX'])->name('validerX.autre');
    Route::post('/etape4au', [AutreControllerNouveau::class, 'validerEtape4'])->name('valider4.autre');
    Route::post('/etape5au', [AutreControllerNouveau::class, 'validerEtape5'])->name('valider5.autre');
    Route::post('/etape6au', [AutreControllerNouveau::class, 'validerEtape6'])->name('valider6.autre');
    //Route::post('/etapefinaleautre',[AutreController::class,]);




    // Routes pour l'authentificationRoute::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');


    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
