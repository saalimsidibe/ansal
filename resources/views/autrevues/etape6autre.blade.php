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
    <form action="">
        @csrf

            <div class="form-group">
                <label for="associationAut" class="control-label">Associations, commissions, réseaux, comités d’experts internationaux d’appartenance</label><br>
                <button type="button" id="ajouterAssAut">Ajouter</button>
            </div>
            <div class="fields-containerAssocAut"></div>

              <div class="form-group">
                <label for="ouvrageEditeAut" class="form-label">Œuvres, ouvrages et principaux documents édités dont vous êtes auteur ou coauteur </label>
                <button type="button" id="ouvrageEditeAut">Ajouter</button>
            </div>
            <div class="ouvrageEditeAut"></div>

           <div class="form-group">
                <label for="ouvrageNonEditeAut" class="form-label">Œuvres, ouvrages et principaux documents non édités dont vous êtes auteur ou coauteur</label>
                <button type="button" id="ajouterOuvrageNonEditeAut">Ajouter</button>
            </div>

            <div class="ouvrageNonEditeAut"></div>

       
       
       
        <div class="form-group">
            <h5>Distinctions honorifiques et scientifiques</h5>
            <select name="" id="" name="distinctionsAut" class="form-control">
                <option value="honorifique">Distinction Honorifique</option>
                <option value="scientifique">Distinction Scientifique</option>
            </select>
            <label for="distinctAu" class="form-label">Nom de la distinction</label>
            <input type="text" name="distinctAu" class="form-control">
            <button type="button" id="add-select">Ajouter</button>
        </div>

         <div id="select-container">
                <!-- Les sélecteurs seront ajoutés ici -->
        </div>

        <label for="">Indiquer quel pourrait être votre apport particulier à l’Académie </label><br>
        <textarea rows="4" cols="50" placeholder="" name=""></textarea><br>

        <label for="">Je déclare sur l’honneur n’avoir jamais été condamné par la justice.</label>
        <input type="checkbox" class="form-control">
        </div>
        </div>
         <div class="btn-group mt-4">
            <a href="{{ route('multi-step-form.previous') }}" class="btn btn-warning">Précédent</a>
             <input type="submit" class="btn btn-info" value="Suivant" />
        </div>
    </form>
    
 </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>
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
                    <label for="nomCommission${fieldCount}">Nom de la commission</label>
                    <input type="text" name="nomCommission[]" id="nomCommission${fieldCount}">
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
                    <input type="text" name="titre[]" id="titre${fieldCount}" required>
                </div>
                <div>
                    <label for="nomAuteur${fieldCount}">Nom de l'auteur</label>
                    <input type="text" name="nomAuteur[]" id="nomAuteur${fieldCount}" required>
                </div>
                <div>
                    <label for="nomCoauteur${fieldCount}">Nom du coauteur</label>
                    <input type="text" name="nomCoauteur[]" id="nomCoauteur${fieldCount}">
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
                    <select name="distinctions[]" class="form-control">
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