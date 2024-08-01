@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li >Etape1</li>
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
                                <div class="card-head info"> Informations Personnelle</div>
                                <div class="card-body">
    <form action="">
        @csrf
        

        <div class="form-group">
            <label for="form-label">Commissions, sociétés savantes/comités d’experts internationaux d’appartenance</label>
        </div>

        <div id="commission-fields">
            <!-- Champs pour saisir le nom des commissions seront ajoutés ici -->
        </div>

        <button type="button" id="addCommissionBtn" class="btn btn-primary mt-3">Ajouter</button>
        
        <div class="form-group" id="brevets">
            <h5>Brevets obtenus (Auteur(s), date, intitulé, références)</h5>
            <button type="button" id="ajouter-champ" class="btn btn-primary mt-3">Ajouter</button>
        </div>
        
        <div class="form-group" id="ouvrages">
            <h5>Ouvrages scientifiques édités (Auteur(s), année de publication, titre, éditeur, nombre de pages)</h5>
            <button type="button" id="ajouter-ouvrage" class="btn btn-primary mt-3">Ajouter</button>
        </div>
        </div>
      <div class="container">
        <div id="articles-container">
            <h5>Articles dans des ouvrages scientifiques (Auteur(s), année de publication, titre, éditeur, pages )</h5>
        </div>
        <button type="button" id="add-field" class="btn btn-primary mt-3">Ajouter un article</button>
        </div>

         <div class="container">
        <div id="distinctions-container">
            <!-- Champs seront ajoutés ici -->
       
        <div class="form-group">
            <label for="contribution" id="contribution" class="label-form">Indiquer votre contribution scientifique majeure dans les domaines du  collège postulé </label>
            <input type="text" class="form-control" name="contributionChecheur">
        </div>

        <div id="distinctionsContainer">
            <div class="form-group">
                <label for="distinction">Distinctions Honorifiques et Scientifiques</label>
                <select name="distinctionTypeCher" class="form-control">
                    <option value="1">Scientifique</option>
                    <option value="2">Sociale</option>
                </select>
                <label for="nomDistinc">Nom de la distinction</label>
                <input type="text" name="distinctionsNomCher" class="form-control" id="nomDistinct"> 
                <label for="dateDistinc">Date de la distinction</label>
                <input type="date" name="dateDistinctCher" id="dateDistinc" class="form-control">
            </div>

        </div>
        <button type="button" id="AjouterDistinction">Ajouter</button>

        <div class="form-group">
            <label for="">Declaration sur l'honneur</label>
            <input type="checkbox" class="form-control" name="honneurChercheur">
        </div>

         <div class="btn-group mt-4">
            <a href="{{ route('multi-step-form.previous') }}" class="btn btn-warning">Précédent</a>
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
            commissionCounter++;  // Incrémente le compteur

            // Ajoute un champ pour saisir le nom de la commission
            $('#commission-fields').append(`
                <div class="mt-3" id="commission-${commissionCounter}">
                    <input type="text" name="commission_names[]" class="form-control" placeholder="Nom de la commission">
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
    document.addEventListener('DOMContentLoaded', function () {
        const addButton = document.getElementById('ajouter-champ');
        const brevetsDiv = document.getElementById('brevets');

        let index = 0;

        addButton.addEventListener('click', function () {
            index++;

            const fieldset = document.createElement('fieldset');
            fieldset.innerHTML = `
                <legend>Brevet ${index}</legend>
                <div class="form-group">
                    <label for="auteurs-${index}">Auteur(s)</label>
                    <input type="text" id="auteurs-${index}" name="auteurs[]" required>
                </div>
                <div class="form-group">
                    <label for="date-${index}">Date</label>
                    <input type="date" id="date-${index}" name="dates[]" required>
                </div>
                <div class="form-group">
                    <label for="intitule-${index}">Intitulé</label>
                    <input type="text" id="intitule-${index}" name="intitules[]" required>
                </div>
                <div class="form-group">
                    <label for="reference-${index}">Reference</label>
                    <input type="text" id="reference-${index}" name="reference[]" required>
                </div>
            `;

            brevetsDiv.appendChild(fieldset);
        });
    });
</script>


<script>
    //script pour ajouter les ouvrages scientifiques édités
    $(document).ready(function () {
        let index = 0;

        $('#ajouter-ouvrage').click(function () {
            index++;

            const nouvelOuvrage = `
                <fieldset id="ouvrage-${index}">
                    <legend>Ouvrage ${index}</legend>
                    <div class="form-group">
                        <label for="auteurs-${index}">Auteur(s)</label>
                        <input type="text" id="auteurs-${index}" name="auteurs[]" required>
                    </div>
                    <div class="form-group">
                        <label for="annee-${index}">Année de publication</label>
                        <input type="text" id="annee-${index}" name="annees[]" required>
                    </div>
                    <div class="form-group">
                        <label for="titre-${index}">Titre</label>
                        <input type="text" id="titre-${index}" name="titres[]" required>
                    </div>
                    <div class="form-group">
                        <label for="editeur-${index}">Éditeur</label>
                        <input type="text" id="editeur-${index}" name="editeurs[]" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_pages-${index}">Nombre de pages</label>
                        <input type="number" id="nombre_pages-${index}" name="nombre_pages[]">
                    </div>
                    <button type="button" class="supprimer-ouvrage" data-index="${index}">Supprimer</button>
                </fieldset>
            `;

            $('#ouvrages').append(nouvelOuvrage);
        });

        // Supprimer un ouvrage
        $('#ouvrages').on('click', '.supprimer-ouvrage', function () {
            const index = $(this).data('index');
            $(`#ouvrage-${index}`).remove();
        });
    });
</script>


<br>
 <script>
    //script pour ajouter les articles dans des ouvrages scientifiques
        $(document).ready(function() {
            var fieldIndex = 0;

            $("#add-field").click(function() {
                fieldIndex++;

                var newField = '<div class="">' +

                                    '<label>Auteur(s):</label>' +
                                    '<input type="text" name="articles[' + fieldIndex + '][auteurs]" required>' + '<br>'+
                                    '<label>Coauteurs:</label>' +
                                    '<input type="text" name="articles[' + fieldIndex + '][coauteurs]">' + '<br>'+
                                    '<label>Année de publication:</label>' +
                                    '<input type="number" name="articles[' + fieldIndex + '][annee_publication]" required>' + '<br>'+
                                    '<label>Titre:</label>' +
                                    '<input type="text" name="articles[' + fieldIndex + '][titre]" required>' + '<br>'+
                                    '<label>Éditeur:</label>' +
                                    '<input type="text" name="articles[' + fieldIndex + '][editeur]" required>' + '<br>'+
                                    '<label>Numéro de pages:</label>' +
                                    '<input type="number" name="articles[' + fieldIndex + '][pages]" required>' + '<br>'+
                                    '<button class="remove-field">Supprimer</button>' +
                                '</div>';
                
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
            
            newFormGroup.innerHTML = `
                <select name="distinctions[${index}][type]" class="form-control">
                    <option value="1">Scientifique</option>
                    <option value="2">Sociale</option>
                </select>
                
                <input type="text" name="distinctions[${index}][nom]" class="form-control">
                <input type="hidden" name="distinctions[${index}][id]" value="" class="form-control" placeholder="nom de la distinction">
                <button type="button" class="removeDistinctionButton">Supprimer</button>
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
   
</script>