@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
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

              <section id="contact" class="contact section">
                <div class="container" data-aos="fade">
                    <div class="row ">
                        <div class="col-2"> </div>
                        <div class="col-8">
                            <div class="card ">
                                <div class="card-head info"> Informations Personnelle</div>
                                <div class="card-body">
   <form action="{{ route('valider6.autre') }}" method="POST">
    @csrf
    @php
        $commissionsAu = old('commissionAu', session('etape6.commissionAu', []));
        $ouvragesEdite = old('ouvrageEdite', session('etape6.ouvrageEdite', []));
        $ouvragesNonEdite = old('ouvrageNonEdite', session('etape6.ouvrageNonEdite', []));
        $distinctionsAut = old('distinctionsAut', session('etape6.distinctionsAut', []));
        $distinctAu = old('distinctAu', session('etape6.distinctAu', ''));
        $apportAu = old('apportAu', session('etape6.apportAu', ''));
        $honneurAu = old('honneurAu', session('etape6.honneurAu', ''));
    @endphp

    <!-- Associations, commissions, réseaux, comités d’experts internationaux d’appartenance -->
    <div class="form-group">
        <label for="associationAut" class="control-label">Associations, commissions, réseaux, comités d’experts internationaux d’appartenance</label><br>
        <button type="button" id="ajouterAssAut" class="btn btn-info">Ajouter</button>
    </div>
    <div class="fields-containerAssocAut">
        @foreach ($commissionsAu as $index => $commission)
            <div class="dynamic-field">
                <div>
                    <label for="nomCommission{{ $index }}" class="form-label">Nom de la commission</label>
                    <input type="text" name="commissionAu[{{ $index }}][nom]" id="nomCommission{{ $index }}" value="{{ $commission['nom'] ?? '' }}">
                </div>
                <button type="button" class="remove-field">Supprimer ce champ</button>
            </div>
        @endforeach
    </div>

    <!-- Œuvres, ouvrages et principaux documents édités dont vous êtes auteur ou coauteur -->
    <div class="form-group">
        <label for="ouvrageEditeAut" class="form-label">Œuvres, ouvrages et principaux documents édités dont vous êtes auteur ou coauteur</label>
        <button type="button" id="ouvrageEditeAut" class="btn btn-info">Ajouter</button>
    </div>
    <div class="ouvrageEditeAut">
        @foreach ($ouvragesEdite as $index => $ouvrage)
            <div class="dynamic-field">
                <div>
                    <label for="titre{{ $index }}">Titre</label>
                    <input type="text" name="titre[]" id="titre{{ $index }}" value="{{ $ouvrage['titre'] ?? '' }}" required>
                </div>
                <div>
                    <label for="anneePublication{{ $index }}">Année de publication</label>
                    <input type="number" name="anneePublication[]" id="anneePublication{{ $index }}" value="{{ $ouvrage['anneePublication'] ?? '' }}" required>
                </div>
                <div>
                    <label for="nomAuteur{{ $index }}">Nom de l'auteur</label>
                    <input type="text" name="nomAuteur[]" id="nomAuteur{{ $index }}" value="{{ $ouvrage['nomAuteur'] ?? '' }}" required>
                </div>
                <div>
                    <label for="nomCoauteur{{ $index }}">Nom du coauteur</label>
                    <input type="text" name="nomCoauteur[]" id="nomCoauteur{{ $index }}" value="{{ $ouvrage['nomCoauteur'] ?? '' }}" required>
                </div>
                <div>
                    <label for="editeur{{ $index }}">Éditeur</label>
                    <input type="text" name="editeur[]" id="editeur{{ $index }}" value="{{ $ouvrage['editeur'] ?? '' }}" required>
                </div>
                <div>
                    <label for="nombrePage{{ $index }}">Nombre de pages</label>
                    <input type="number" name="nombrePage[]" id="nombrePage{{ $index }}" value="{{ $ouvrage['nombrePage'] ?? '' }}" required>
                </div>
                <button type="button" class="remove-field">Supprimer ces champs</button>
                <hr>
            </div>
        @endforeach
    </div>

    <!-- Œuvres, ouvrages et principaux documents non édités dont vous êtes auteur ou coauteur -->
    <div class="form-group">
        <label for="ouvrageNonEditeAut" class="form-label">Œuvres, ouvrages et principaux documents non édités dont vous êtes auteur ou coauteur</label>
        <button type="button" id="ajouterOuvrageNonEditeAut" class="btn btn-info">Ajouter</button>
    </div>
    <div class="ouvrageNonEditeAut">
        @foreach ($ouvragesNonEdite as $index => $ouvrage)
            <div class="dynamic-field">
                <div>
                    <label for="titreNe{{ $index }}">Titre</label>
                    <input type="text" name="titreNe[]" id="titreNe{{ $index }}" value="{{ $ouvrage['titre'] ?? '' }}" required>
                </div>
                <div>
                    <label for="nomAuteurNe{{ $index }}">Nom de l'auteur</label>
                    <input type="text" name="nomAuteurNe[]" id="nomAuteurNe{{ $index }}" value="{{ $ouvrage['nomAuteur'] ?? '' }}" required>
                </div>
                <div>
                    <label for="nomCoauteurNe{{ $index }}">Nom du coauteur</label>
                    <input type="text" name="nomCoauteurNe[]" id="nomCoauteurNe{{ $index }}" value="{{ $ouvrage['nomCoauteur'] ?? '' }}">
                </div>
                <button type="button" class="remove-field">Supprimer ces champs</button>
                <hr>
            </div>
        @endforeach
    </div>

    <!-- Distinctions honorifiques et scientifiques -->
    <div class="form-group">
        <h5>Distinctions honorifiques et scientifiques</h5>
        <select id="" name="distinctionsAut" class="form-control">
            <option value="honorifique" {{ $distinctionsAut == 'honorifique' ? 'selected' : '' }}>Distinction Honorifique</option>
            <option value="scientifique" {{ $distinctionsAut == 'scientifique' ? 'selected' : '' }}>Distinction Scientifique</option>
        </select>
        <label for="distinctAu" class="form-label">Nom de la distinction</label>
        <input type="text" name="distinctAu" class="form-control" value="{{ $distinctAu }}">
        <button type="button" id="add-select" class="btn btn-info">Ajouter</button>
    </div>

    <div id="select-container">
        @foreach ($distinctionsAut as $index => $distinction)
            <div>
                <select name="distinctionsAu[]" class="form-control">
                    <option value="honorifique" {{ $distinction == 'honorifique' ? 'selected' : '' }}>Distinction Honorifique</option>
                    <option value="scientifique" {{ $distinction == 'scientifique' ? 'selected' : '' }}>Distinction Scientifique</option>
                </select>
                <button type="button" onclick="removeSelect(this)">Supprimer</button>
            </div>
        @endforeach
    </div>

    <!-- Apport particulier à l’Académie -->
    <label for="">Indiquer quel pourrait être votre apport particulier à l’Académie </label><br>
    <textarea rows="4" cols="50" name="apportAu">{{ $apportAu }}</textarea><br>

    <!-- Déclaration sur l’honneur -->
    <div class="form-group">
          <label for="declaration">.</label>
          <input name="honneurAu" id="declaration" type="checkbox" placeholder="" value="1"   class="form-control" {{ $honneurAu ? 'checked' : '' }} required> 

    </div>
    <input type="checkbox" name="" id="">
    <input type="submit" value="valider">
    </form>

    @endsection
  
    
        
@section('scripts')
    <script>
        //ajouter des associations
        document.getElementById('ajouterAssAut').addEventListener('click', function() {
            addDynamicField();
        });

        function addDynamicField() {
            const container = document.querySelector('.fields-containerAssocAut');
            const fieldCount = container.querySelectorAll('.dynamic-field').length;

            const newField = document.createElement('div');
            newField.className = 'dynamic-field';
            newField.dataset.index = fieldCount;

            newField.innerHTML = `
                <div>
                    <label for="nomCommission${fieldCount}" class="form-label">Nom de la commission</label>
                    <input type="text" name="commissionAu[${fieldCount}][nom]" id="nomCommission${fieldCount}">
                </div>
                <button type="button" class="remove-field">Supprimer ce champ</button>
            `;

            container.appendChild(newField);

            // Add event listener to the remove button
            newField.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(newField);
            });
        }
    </script>
    <script>
        //Ajouter ouvrage edité par autre
          document.getElementById('ouvrageEditeAut').addEventListener('click', function() {
            addDynamicFields();
        });

        function addDynamicFields() {
            const container = document.querySelector('.ouvrageEditeAut');
            const fieldCount = container.querySelectorAll('.dynamic-field').length;

            const newFields = document.createElement('div');
            newFields.className = 'dynamic-field';
            newFields.dataset.index = fieldCount;

            newFields.innerHTML = `
                <div>
                    <label for="titre${fieldCount}">Titre</label>
                    <input type="text" name="titre[]" id="titre${fieldCount}" required>
                </div>
                <div>
                    <label for="anneePublication${fieldCount}">Année de publication</label>
                    <input type="number" name="anneePublication[]" id="anneePublication${fieldCount}" required>
                </div>
                <div>
                    <label for="nomAuteur${fieldCount}">Nom de l'auteur</label>
                    <input type="text" name="nomAuteur[]" id="nomAuteur${fieldCount}" required>
                </div>

                 <div>
                    <label for="nomCoauteur${fieldCount}">Nom du coauteur</label>
                    <input type="text" name="nomCoauteur[]" id="nomCoauteur${fieldCount}" required>
                </div>

                <div>
                    <label for="editeur${fieldCount}">Éditeur</label>
                    <input type="text" name="editeur[]" id="editeur${fieldCount}" required>
                </div>
                <div>
                    <label for="nombrePage${fieldCount}">Nombre de pages</label>
                    <input type="number" name="nombrePage[]" id="nombrePage${fieldCount}" required>
                </div>
                <button type="button" class="remove-field">Supprimer ces champs</button>
                <hr>
            `;

            container.appendChild(newFields);

            // Add event listener to the remove button
            newFields.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(newFields);
            });
        }
    </script>

    <script>
        //script pour ajouter les ouvrages non edités
        document.getElementById('ajouterOuvrageNonEditeAut').addEventListener('click', function() {
            addDynamicFields();
        });

        function addDynamicFields() {
            const container = document.querySelector('.ouvrageNonEditeAut');
            const fieldCount = container.querySelectorAll('.dynamic-field').length;

            const newFields = document.createElement('div');
            newFields.className = 'dynamic-field';
            newFields.dataset.index = fieldCount;

            newFields.innerHTML = `
                <div>
                    <label for="titre${fieldCount}">Titre</label>
                    <input type="text" name="titreNe[]" id="titre${fieldCount}" required>
                </div>
                <div>
                    <label for="nomAuteur${fieldCount}">Nom de l'auteur</label>
                    <input type="text" name="nomAuteurNe[]" id="nomAuteur${fieldCount}" required>
                </div>
                <div>
                    <label for="nomCoauteur${fieldCount}">Nom du coauteur</label>
                    <input type="text" name="nomCoauteurNe[]" id="nomCoauteur${fieldCount}">
                </div>
                <button type="button" class="remove-field">Supprimer ces champs</button>
                <hr>
            `;

            container.appendChild(newFields);

            // Add event listener to the remove button
            newFields.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(newFields);
            });
        }
    </script>
    <script>
        //ajouter les distinctions
        document.addEventListener('DOMContentLoaded', function () {
            const selectContainer = document.getElementById('select-container');
            const addSelectButton = document.getElementById('add-select');
            
            addSelectButton.addEventListener('click', function () {
                // Crée un nouveau conteneur pour le select
                const newSelectDiv = document.createElement('div');
                newSelectDiv.innerHTML = `
                    <select name="distinctionsAu[]" class="form-control">
                        <option value="honorifique">Distinction Honorifique</option>
                        <option value="scientifique">Distinction Scientifique</option>
                    </select>
                    <button type="button" onclick="removeSelect(this)">Supprimer</button>
                `;

                // Ajoute le nouveau select au conteneur
                selectContainer.appendChild(newSelectDiv);
            });
        });

        function removeSelect(button) {
            const selectContainer = document.getElementById('select-container');
            selectContainer.removeChild(button.parentElement);
        }
    </script>
@endsection