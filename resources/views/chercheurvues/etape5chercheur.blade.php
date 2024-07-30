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
                        <li >Etape4</li>
                        <li class="current"><a href="#">Etape5</a></li>
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
    <form action="">
        @csrf
      <div class="form-group">
            <label for="expprofint">Expériences professionnelles exercées au plan international</label>
            <select name="expprofint" id="expprofint" class="form-control">
                <option value="">Sélectionner</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <!--Div pour ajouter les fonctions internationales-->
         <div id="dynamic-container">
            <button type="button" id="add-button" style="display: none;">Ajouter</button>
            <div id="fields-container"></div>
        </div>

       <div class="form-group">
            <label for="respprofint">Responsabilités administratives exercées au plan international</label>
            <select name="respprofint" id="respprofint" class="form-control">
                <option value="">Sélectionner</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

         <!-- Partie dynamique pour les responsabilites à l'international ID -->
        <div class="dynamic-section">
            <button type="button" id="add-btn" style="display: none;">Ajouter</button>
            <div class="fields-wrapper"></div>
        </div>

        <button onclick="window.location.href='{{ route('etape6chercheur') }}'" class="btn btn-info">Suivant</button>

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


//SCRIPT POUR AJOUTER LES FONCTIONS A L'INTERNATIONAL
 document.addEventListener('DOMContentLoaded', function() {
            const expprofintSelect = document.getElementById('expprofint');
            const addButton = document.getElementById('add-button');
            const fieldsContainer = document.getElementById('fields-container');

            // Afficher ou masquer le bouton Ajouter en fonction de la sélection
            expprofintSelect.addEventListener('change', function() {
                if (expprofintSelect.value === 'oui') {
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
                    <legend>Expérience ${index + 1}</legend>
                    <label>Intitulé de la fonction:</label>
                    <input type="text" name="intitule_${index}" /><br/>
                    <label>Début:</label>
                    <input type="date" name="debut_${index}" /><br/>
                    <label>Fin:</label>
                    <input type="date" name="fin_${index}" /><br/>
                    <label>Structure:</label>
                    <input type="text" name="structure_${index}" /><br/>
                    <label>Ville:</label>
                    <input type="text" name="ville_${index}" /><br/>
                    <label>Pays:</label>
                    <input type="text" name="pays_${index}" /><br/>
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

 <script>
        document.addEventListener('DOMContentLoaded', function() {
            const respprofintSelect = document.getElementById('respprofint');
            const addButton = document.getElementById('add-btn');
            const fieldsWrapper = document.querySelector('.fields-wrapper');

            // Afficher ou masquer le bouton Ajouter en fonction de la sélection
            respprofintSelect.addEventListener('change', function() {
                if (respprofintSelect.value === 'oui') {
                    addButton.style.display = 'block'; // Afficher le bouton Ajouter
                } else {
                    addButton.style.display = 'none'; // Masquer le bouton Ajouter
                    fieldsWrapper.innerHTML = ''; // Effacer les champs si 'Non' est sélectionné
                }
            });

            // Ajouter de nouveaux champs lorsque le bouton Ajouter est cliqué
            addButton.addEventListener('click', function() {
                const index = fieldsWrapper.children.length; // Compter les ensembles de champs existants
                const newFieldSet = document.createElement('fieldset');
                newFieldSet.innerHTML = `
                    <legend>Responsabilité ${index + 1}</legend>
                    <label>Intitulé de la fonction:</label>
                    <input type="text" name="intitule_${index}" /><br/>
                    <label>Début:</label>
                    <input type="date" name="debut_${index}" /><br/>
                    <label>Fin:</label>
                    <input type="date" name="fin_${index}" /><br/>
                    <label>Structure:</label>
                    <input type="text" name="structure_${index}" /><br/>
                    <label>Ville:</label>
                    <input type="text" name="ville_${index}" /><br/>
                    <label>Pays:</label>
                    <input type="text" name="pays_${index}" /><br/>
                    <button type="button" class="remove-btn">Supprimer</button>
                    <hr/>
                `;
                fieldsWrapper.appendChild(newFieldSet);

                // Ajouter un écouteur d'événements au bouton Supprimer
                newFieldSet.querySelector('.remove-btn').addEventListener('click', function() {
                    fieldsWrapper.removeChild(newFieldSet);
                });
            });
        });
    </script>
  

@endsection