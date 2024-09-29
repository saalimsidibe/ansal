@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li>Etape2</li>
                        <li>Etape3</li>
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li class="current"><a href="#">Etape6</a></li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <section id="contact" class="contact section">
                <div class="container" data-aos="fade">
                    <div class="row ">
                        <div class="col-2"> </div>
                        <div class="col-8">
                            <div class="card ">
                                <div class="card-head info"></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('multi-step-form.next') }}">
                                        @csrf
                                        <!-- Affichage des erreurs de validation -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <fieldset class="border p-2">
                                            <legend class="scheduler-border float-none w-auto">Commissions, sociétés
                                                savantes/comités d’experts internationaux d’appartenance</legend>
                                            <div id="commission-fields">
                                                @php
                                                    $commissions = old('commissions', session('data6.commissions', []));
                                                  
                                                @endphp
                                                @foreach ($commissions as $index => $commission)
                                                    <div class="form-group">
                                                        <input type="text" name="commissions[{{ $index }}]['name']"
                                                            class="form-control"
                                                            value="{{ old("commissions.$index.name", $commission['name'] ?? '') }}"
                                                            required>
                                                          <button type="button" class="btn btn-danger remove-field" onclick="removeField(this)">Supprimer</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" id="addCommissionBtn"
                                                class="btn btn-primary mt-3">Ajouter</button>
                                        </fieldset><br>

                                        <fieldset class="border p-2">
                                            <legend class="scheduler-border float-none w-auto">Brevets obtenus</legend>
                                            <div id="brevets">
                                                <p>(Auteur(s), date, intitulé, références)</p>
                                                @php
                                                    $brevets = old('brevets', session('data6.brevets', []));
                                                @endphp
                                                @foreach ($brevets as $index => $brevet)
                                                    <div class="form-group">
                                                        <legend>Brevet{{ $index }}</legend>
                                                        <div class="form-group">
                                                            <label for="auteurs-{{ $index }}">Auteur(s)</label>
                                                            <input class="form-control" type="text"
                                                                id="auteurs-{{ $index }}"
                                                                value="{{ old("brevets.$index.auteur", $brevet['auteur'] ?? '') }}"
                                                                name="brevets[{{ $index }}][auteur]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date-{{ $index }}">Date</label>
                                                            <input class="form-control" type="date"
                                                                id="date-{{ $index }}"
                                                                value="{{ old("brevets.$index.date", $brevet['date'] ?? '') }}"
                                                                name="brevets[{{ $index }}][date]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="intitule-{{ $index }}">Intitulé</label>
                                                            <input class="form-control" type="text"
                                                                id="intitule-{{ $index }}"
                                                                value="{{ old("brevets.$index.intitule", $brevet['intitule'] ?? '') }}"
                                                                name="brevets[{{ $index }}][intitule]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reference-{{ $index }}">Reference</label>
                                                            <input class="form-control" type="text"
                                                                id="reference-{{ $index }}"
                                                                value="{{ old("brevets.$index.reference", $brevet['reference'] ?? '') }}"
                                                                name="brevets[{{ $index }}][reference]" required>

                                                        </div>
                                                          <button type="button" class="btn btn-danger" onclick="removeField(this)">Supprimer</button>
                                                    </div>
                                                @endforeach
                                                <button type="button" id="ajouter-champ"
                                                    class="btn btn-primary mt-3">Ajouter</button>
                                            </div>
                                        </fieldset><br>

                                        <fieldset class="border p-2">
                                            <legend class="scheduler-border float-none w-auto">Ouvrages scientifiques édités
                                            </legend>
                                            <div id="ouvrages">
                                                <p>(Auteur(s), année de publication, titre, éditeur, nombre de pages)</p>
                                                @php
                                                    $ouvrages = old('ouvrages', session('data6.ouvrages', []));
                                                @endphp
                                                @foreach ($ouvrages as $index => $ouvrage)
                                                    <div class="form-group">
                                                        <fieldset id="ouvrage-{{ $index }}">
                                                            <legend>Ouvrage{{ $index }}</legend>
                                                            <div class="form-group">
                                                                <label for="auteurs-{{ $index }}">Auteur(s)</label>
                                                                <input class="form-control" type="text"
                                                                    id="auteurs-{{ $index }}"
                                                                    name="ouvrages[{{ $index }}][auteur]" value="{{ $ouvrage['auteur'] ?? '' }}"     required>
                                                            </div >

                                                            <div class="form-group">
                                                                <label for="coauteurs-{{$index }}">Coauteur</label>
                                                                <input class="form-control" type="text" id="coauteurs-{{$index }}" name="ouvrages[{{ $index }}][coauteur]"  value="{{ $ouvrage['coauteur'] ?? '' }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="annee-{{ $index }}">Année de
                                                                    publication</label>
                                                                <input type="date" class="form-control"
                                                                    id="annee-{{ $index }}"
                                                                    name="ouvrages[{{ $index }}][annee]" value="{{ $ouvrage['annee'] ?? '' }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="titre-{{ $index }}">Titre</label>
                                                                <input type="text" class="form-control"
                                                                    id="titre-{{ $index }}"
                                                                    name="ouvrages[{{ $index }}][titre]" value="{{ $ouvrage['titre'] ?? '' }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editeur-{{ $index }}">Éditeur</label>
                                                                <input type="text" class="form-control"
                                                                    id="editeur-{{ $index }}"
                                                                    name="ouvrages[{{ $index }}][editeur]" value="{{ $ouvrage['editeur'] ?? '' }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre_pages-{{ $index }}">Nombre de
                                                                    pages</label>
                                                                <input type="number" class="form-control"
                                                                    id="nombre_pages-{{ $index }}"
                                                                    name="ouvrages[{{ $index }}][nombre_pages]" value="{{ $ouvrage['nombre_pages'] ?? '' }}" required>
                                                            </div>
                                                            <button type="button"
                                                                class="supprimer-ouvrage btn btn-danger"
                                                                data-index="{{ $index }}">Supprimer</button>
                                                        </fieldset>
                                                    </div>
                                                @endforeach
                                                <button type="button" id="ajouter-ouvrage"
                                                    class="btn btn-primary mt-3">Ajouter</button>
                                            </div>
                                        </fieldset><br>

                                        <fieldset class="border p-2">
                                            <legend class="scheduler-border float-none w-auto">Articles dans des ouvrages
                                                scientifiques</legend>
                                            <div id="articles-container">
                                                <p>(Auteur(s), année de publication, titre, éditeur, pages)</p>
                                                @php
                                                    $articles = old('articles', session('data6.articles', []));
                                                @endphp
                                                @foreach ($articles as $index => $article)
                                                    <div class="form-group">
                                                        <label>Auteur(s):</label>
                                                        <input class="form-control" type="text"
                                                            name="articles[{{ $index }}][auteur]"
                                                            value="{{ old("articles.$index.intitule", $article['auteur'] ?? '') }}"
                                                            required><br>
                                                        <label>Coauteurs:</label>
                                                        <input class="form-control" type="text"
                                                            name="articles[{{ $index }}][coauteur]"
                                                            value="{{ old("articles.$index.coauteur", $article['coauteur'] ?? '') }}"><br>
                                                        <label>Année de publication:</label>
                                                        <input class="form-control" type="number"
                                                            name="articles[{{ $index }}][annee_publication]"
                                                            value="{{ old("articles.$index.annee_publication", $article['annee_publication'] ?? '') }}"
                                                            required><br>
                                                        <label>Titre:</label>
                                                        <input class="form-control" type="text"
                                                            name="articles[{{ $index }}][titre]"
                                                            value="{{ old("articles.$index.titre", $article['titre'] ?? '') }}"
                                                            required><br>
                                                        <label>Éditeur:</label>
                                                        <input class="form-control" type="text"
                                                            name="articles[{{ $index }}][editeur]"
                                                            value="{{ old("articles.$index.editeur", $article['editeur'] ?? '') }}"
                                                            required><br>
                                                        <label>Numéro de pages:</label>
                                                        <input class="form-control" type="number"
                                                            name="articles[{{ $index }}][pages]"
                                                            value="{{ old("articles.$index.pages", $article['pages'] ?? '') }}"
                                                            required><br>
                                                        <button class="remove-field btn btn-danger">Supprimer</button>
                                                    </div>
                                                    <hr />
                                                @endforeach
                                                <button type="button" id="add-field"
                                                    class="btn btn-primary mt-3">Ajouter un article</button>
                                            </div>
                                        </fieldset><br>

                                        <fieldset class="border p-2">
                                            <legend class="scheduler-border float-none w-auto">Distinctions</legend>
                                            <div id="distinctions-container">


                                                <div id="distinctionsContainer">
                                                    @php
                                                        $distinctions = old(
                                                            'distinctions',
                                                            session('data6.distinctions', []),
                                                        );
                                                        // dd(session('data6', []));
                                                    @endphp
                                                    @foreach ($distinctions as $index => $distinction)
                                                        <div class="form-group">
                                                            <br />
                                                            <label for="distinction">Distinctions Honorifiques et
                                                                Scientifiques</label>
                                                            <select name="distinctions[{{ $index }}][type]"
                                                                class="form-control">
                                                                <option value="1"
                                                                    {{ $distinction['type'] == '1' ? 'selected' : '' }}>
                                                                    Scientifique</option>
                                                                <option value="2"
                                                                    {{ $distinction['type'] == '2' ? 'selected' : '' }}>
                                                                    Sociale</option>
                                                            </select>
                                                            <label for="distinctions[{{ $index }}][nom]">Nom de la
                                                                distinction</label>
                                                            <input type="text"
                                                                name="distinctions[{{ $index }}][nom]"
                                                                class="form-control"
                                                                value="{{ $distinction['nom'] ?? '' }}" required>
                                                            <label for="distinctions[{{ $index }}][date]">Date de
                                                                la distinction</label>
                                                            <input type="date"
                                                                name="distinctions[{{ $index }}][date]"
                                                                class="form-control"
                                                                value="{{ $distinction['date'] ?? '' }}" required>
                                                                  <button type="button" class="btn btn-danger" onclick="removeField(this)">Supprimer</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" id="AjouterDistinction"
                                                    class="btn btn-primary mt-3">Ajouter</button>

                                            </div>
                                        </fieldset><br>

                                          <div class="form-group">
                                                    <label for="contribution">Indiquer votre contribution scientifique
                                                        majeure dans les domaines du collège postulé</label>
                                                    <input type="text" class="form-control"
                                                        name="contributionChecheur"
                                                        value="{{ old('contributionChecheur', session('data6.contributionChecheur')) }}"
                                                        required>
                                                </div>
                                        <div class="form-group">
                                            <label for="honneurChercheur">Déclaration sur l'honneur</label>
                                            <input type="checkbox" name="honneurChercheur" class="form-group"
                                                {{ old('honneurChercheur', session('data6honneurChercheur.honneurChercheur')) ? 'checked' : '' }}>
                                        </div>

                                        <div class="btn-group mt-4">
                                            <a href="{{ route('multi-step-form.previous') }}"
                                                class="btn btn-warning">Précédent</a>
                                            <input type="submit" class="btn btn-info" value="Suivant" />
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>
@endsection


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>


<script>
    //script pour ajouter les commisions
    $(document).ready(function() {
        // Compteur pour les noms de commissions ajoutés
        let commissionCounter = 0;

        // Action du bouton "Ajouter"
        $('#addCommissionBtn').click(function() {
            commissionCounter++; // Incrémente le compteur

            // Ajoute un champ pour saisir le nom de la commission
            $('#commission-fields').append(`
                <div class="mt-3" id="commission-${commissionCounter}">
                    <input type="text" name="commissions[${commissionCounter}][name]" class="form-control" placeholder="Nom de la commission" required>
                    <button type="button" class="btn btn-danger mt-2" onclick="removeCommission(${commissionCounter})">Supprimer</button>
                </div>
            `);
        });

        // Fonction pour supprimer un champ de commission
        window.removeCommission = function(index) {
            $('#commission-' + index).remove();
        };
    });
</script>
<script>
    //script pour ajouter des brevets
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('ajouter-champ');
        const brevetsDiv = document.getElementById('brevets');

        let index = 0;

        addButton.addEventListener('click', function() {
            index++;

            const fieldset = document.createElement('fieldset');
            fieldset.classList.add('border','p-2');
            fieldset.innerHTML = `
                <legend class ="scheduler-border float-none w-auto"><h6>Nouveau Brevet</h6></legend>
                <div class="form-group">
                    <label for="auteurs-${index}">Auteur(s)</label>
                    <input class="form-control" type="text" id="auteurs-${index}" name="brevets[${index}][auteur]" required>
                </div>
                <div class="form-group">
                    <label for="date-${index}">Date</label>
                    <input class="form-control" type="date" id="date-${index}" name="brevets[${index}][date]" required>
                </div>
                <div class="form-group">
                    <label for="intitule-${index}">Intitulé</label>
                    <input class="form-control" type="text" id="intitule-${index}" name="brevets[${index}][intitule]" required>
                </div>
                <div class="form-group">
                    <label for="reference-${index}">Reference</label>
                    <input class="form-control" type="text" id="reference-${index}" name="brevets[${index}][reference]" required>
                </div>

                  <button type="button" class="btn btn-danger btn-sm remove-button">Supprimer</button>
                  <hr/>
            `;

            brevetsDiv.appendChild(fieldset);

             const removeButton = fieldset.querySelector('.remove-button');
        removeButton.addEventListener('click', function() {
            brevetsDiv.removeChild(fieldset);
        });
        });
    });
</script>


<script>
    //script pour ajouter les ouvrages scientifiques édités
    $(document).ready(function() {
        let index = 0;

        $('#ajouter-ouvrage').click(function() {
            index++;

            const nouvelOuvrage = `
                <fieldset id="ouvrage" class="border p-2">
                    <legend class ="scheduler-border float-none w-auto"><h6>Ouvrage</h6></legend>
                    <div class="form-group">
                        <label for="auteurs-${index}">Auteur(s)</label>
                        <input  class="form-control" type="text" id="auteurs-${index}" name="ouvrages[${index}][auteur]" required>
                    </div>
                       <div class="form-group">
                        <label for="coauteurs-${index}">Coauteurs</label>
                        <input  class="form-control" type="text" id="coauteurs-${index}" name="ouvrages[${index}][coauteur]">
                    </div>

                    <div class="form-group">
                        <label for="annee-${index}">Année de publication</label>
                        <input type="date" class="form-control" id="annee-${index}" name="ouvrages[${index}][annee]" required>
                    </div>
                    <div class="form-group">
                        <label for="titre-${index}">Titre</label>
                        <input type="text" class="form-control" id="titre-${index}" name="ouvrages[${index}][titre]" required>
                    </div>
                    <div class="form-group">
                        <label for="editeur-${index}">Éditeur</label>
                        <input type="text" class="form-control" id="editeur-${index}" name="ouvrages[${index}][editeur]" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_pages-${index}">Nombre de pages</label>
                        <input type="number" class="form-control" id="nombre_pages-${index}" name="ouvrages[${index}][nombre_pages]">
                    </div>
                    <button type="button" class="supprimer-ouvrage btn btn-danger" data-index="${index}">Supprimer</button>
                </fieldset>
            `;

            $('#ouvrages').append(nouvelOuvrage);
        });

        // Supprimer un ouvrage
        $('#ouvrages').on('click', '.supprimer-ouvrage', function() {
            const index = $(this).data('index');
            $(`#ouvrage-${index}`).remove();
        });
    });
</script>



<br>
<script>
    var fieldIndex = 0;
    //script pour ajouter les articles dans des ouvrages scientifiques
    $(document).ready(function() {


        $("#add-field").click(function() {
            fieldIndex++;

            var newField = '<div class="">' +
                '<fieldset class="border p-2">'+
                 '<legend class ="scheduler-border float-none w-auto">' + '<h6>Articles </h6>' +'</legend>'+
                '<label>Auteur(s):</label>' +
                '<input class="form-control" type="text" name="articles[' + fieldIndex +
                '][auteur]" required>' + '<br>' +
                '<label>Coauteurs:</label>' +
                '<input  class="form-control" type="text" name="articles[' + fieldIndex +
                '][coauteur]">' + '<br>' +
                '<label>Année de publication:</label>' +
                '<input class="form-control" type="number" name="articles[' + fieldIndex +
                '][annee_publication]" required>' + '<br>' +
                '<label>Titre:</label>' +
                '<input  class="form-control" type="text" name="articles[' + fieldIndex +
                '][titre]" required>' + '<br>' +
                '<label>Éditeur:</label>' +
                '<input class="form-control" type="text" name="articles[' + fieldIndex +
                '][editeur]" required>' + '<br>' +
                '<label>Numéro de pages:</label>' +
                '<input class="form-control" type="number" name="articles[' + fieldIndex +
                '][pages]" required>' + '<br>' +
                '<button class="remove-field btn btn-danger">Supprimer</button>' +
                '</legend>'+
                '</div>  <hr/>';


            $("#articles-container").append(newField);
            $("#save-button").show(); // Afficher le bouton Enregistrer une fois qu'un champ est ajouté
        });

        // Supprimer un champ dynamique
        $(document).on("click", ".remove-field", function() {
            $(this).parent().remove();
            // Cacher le bouton Enregistrer s'il n'y a plus de champs
            if ($("#articles-container").children().length === 0) {
                $("#save-button").hide();
            }
        });
    });
</script>

<script>
    //script pour ajouter les distinctions honorifiques

    document.addEventListener('DOMContentLoaded', function() {
        const ajouterDistinctionButton = document.getElementById('AjouterDistinction');
        const distinctionsContainer = document.getElementById('distinctionsContainer');
        let index = 0; // L'index pour les nouveaux groupes de champs

        ajouterDistinctionButton.addEventListener('click', function() {
            const newFormGroup = document.createElement('div');
            newFormGroup.classList.add('form-group');
            newFormGroup.innerHTML = `

                <fieldset class = "border p-2">
                   <legend class="scheduler-border float-none w-auto"> <h6>Distinction</h6>  </legend>
                <select name="distinctions[${index}][type]" class="form-control" required>
                     <option value="">Selectionner</option>
                    <option value="1">Scientifique</option>
                    <option value="2">Sociale</option>
                </select>

                <input type="text" name="distinctions[${index}][nom]" placeholder="Saisir la distinction" class="form-control">
                <input type="hidden" name="distinctions[${index}][id]" value="" class="form-control" placeholder="nom de la distinction">
                 <input type="date" name="distinctions[${index}][date]" placeholder="Saisir la date de la distinction" class="form-control">
                <button type="button" class=" btn btn-danger"onclick="removeField(this)" >Supprimer</button>

                  <hr/>

                 </fieldset>
            `;

            distinctionsContainer.appendChild(newFormGroup);
            index++;
        });

        distinctionsContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('removeDistinctionButton')) {
                const formGroup = event.target.parentElement;
                distinctionsContainer.removeChild(formGroup);
            }
        });

    });
</script>

<script>
     window.removeField = function(button) {
                button.parentElement.remove();
            };
</script>
