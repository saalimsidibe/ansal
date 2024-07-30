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
                        <li class="current"><a href="#">Etape4</a></li>
                        <li>Etape5</li>
                        <li>Etape6</li>
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
    
        @csrf
        <div class="form-group">
            <label for="expadmin" class="label-form">Expériences professionnelles exercées au plan national</label>
            <select name="expadmin" id="expadmin" class="form-control">
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div><br>

        <div id="dynamic-fields" class="d-none">
            <h3>Ajouter une expérience</h3>
            <div id="experience-container">
                <!-- Champs dynamiques pour ajouter les experiences seront ajoutés ici -->
            </div>
            <button type="button" id="add-field" class="btn btn-primary mt-2">Ajouter</button> <br>
        </div>

        <button type="submit" class="btn btn-success mt-4">Soumettre</button> <br>
       
       
             <label for="respadmin" class="label-form">Responsabilités administratives exercées au plan national </label>
                <select name="respadmin" id="respadmin" class="form-control">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
            </select>

        </div>
       
          <div id="dynamic-container">
            <button type="button" id="add-button" style="display: none;">Ajouter</button>
            <div id="fields-container"></div>
        </div>

        <input type="submit" value="Soumettre" />




    </form>

</div>
                            </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>

</div> 
@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script>
          document.addEventListener('DOMContentLoaded', function () {
        const expadminSelect = document.getElementById('expadmin');
        const dynamicFieldsDiv = document.getElementById('dynamic-fields');
        const experienceContainer = document.getElementById('experience-container');
        const addFieldButton = document.getElementById('add-field');
        let fieldIndex = 0;

        expadminSelect.addEventListener('change', function () {
            if (this.value === 'oui') {
                dynamicFieldsDiv.classList.remove('d-none');
            } else {
                dynamicFieldsDiv.classList.add('d-none');
                experienceContainer.innerHTML = ''; // Clear fields if "Non" is selected
            }
        });

        addFieldButton.addEventListener('click', function () {
            fieldIndex++;
            const newField = document.createElement('div');
            newField.classList.add('mb-3');
            newField.innerHTML = `
                <div class="form-group">
                    <label for="intitule_${fieldIndex}">Intitulé de la fonction</label>
                    <input type="text" name="intitule_${fieldIndex}" id="intitule_${fieldIndex}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="debut_${fieldIndex}">Début de la fonction</label>
                    <input type="date" name="debut_${fieldIndex}" id="debut_${fieldIndex}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fin_${fieldIndex}">Fin de la fonction</label>
                    <input type="date" name="fin_${fieldIndex}" id="fin_${fieldIndex}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ville_${fieldIndex}">Ville</label>
                    <input type="text" name="ville_${fieldIndex}" id="ville_${fieldIndex}" class="form-control">
                </div>
                <button type="button" class="remove-btn" onclick="removeField(this)">Supprimer ce champ</button>
            `;
            experienceContainer.appendChild(newField);
        });

        window.removeField = function (button) {
            button.parentElement.remove();
        };
    });
    </script>


        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const respadminSelect = document.getElementById('respadmin');
            const addButton = document.getElementById('add-button');
            const fieldsContainer = document.getElementById('fields-container');

            // Afficher ou masquer le bouton Ajouter en fonction de la sélection
            respadminSelect.addEventListener('change', function() {
                if (respadminSelect.value === 'oui') {
                    addButton.style.display = 'block'; // Afficher le bouton Ajouter
                } else {
                    addButton.style.display = 'none'; // Masquer le bouton Ajouter
                    fieldsContainer.innerHTML = ''; // Effacer les champs si 'Non' est sélectionné
                }
            });

            // Ajouter de nouveaux champs lorsque le bouton Ajouter est cliqué
            addButton.addEventListener('click', function() {
                const index = fieldsContainer.children.length; // Compter les ensembles de champs existants
                const newFieldSet = document.createElement('fieldset');
                newFieldSet.innerHTML = `
                    <legend>Responsabilité ${index + 1}</legend>
                    <label>Intitulé de la responsabilité:</label>
                    <input type="text" name="intitule_${index}" /><br/>
                    <label>Début:</label>
                    <input type="date" name="debut_${index}" /><br/>
                    <label>Fin:</label>
                    <input type="date" name="fin_${index}" /><br/>
                    <label>Structure:</label>
                    <input type="text" name="structure_${index}" /><br/>
                    <label>Ville:</label>
                    <input type="text" name="ville_${index}" /><br/>
                    <button type="button" class="remove-button">Supprimer</button>
                    <hr/>
                `;
                fieldsContainer.appendChild(newFieldSet);

                // Ajouter un écouteur d'événements au bouton Supprimer
                newFieldSet.querySelector('.remove-button').addEventListener('click', function() {
                    fieldsContainer.removeChild(newFieldSet);
                });
            });
        });
    </script>
  

@endsection