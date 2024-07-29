@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li >Etape2</li>
                        <li><Etape3></li>
                        <li class="current"><a href="#">Etape4</a></li>
                        <li>Etape5</li>
                        <li>Etape6</li>
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
        <label for="expadminAu" class="label-form">Expériences professionnelles exercées au plan national</label>
        <select name="expadminAu" id="expadminAu" class="form-control">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
      </div>
       <!-- Conteneur pour le bouton et les champs supplémentaires de l'experience -->
    <div id="experience-section" style="display: none;">
        <button type="button" id="add-experience" class="btn btn-primary">Ajouter une expérience</button>
        <div id="experiences-list"></div>
    </div>

    <div class="form-group">
            <label for="respadminAu" class="label-form">Responsabilités administratives exercées au plan national</label>
            <select name="respadminAu" id="respadminAu" class="form-control">
                <option value="non">Non</option>
                <option value="oui">Oui</option>
            </select>
        </div>

<!-- Conteneur pour les champs supplémentaires de la responsabilite -->

         <div id="respadminDynamic" class="respadmin-dynamic"></div>
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
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    <script>
        //ajouter et supprimer champs experience professionnelle

         // Écoutez les changements sur le select
    document.getElementById('expadminAu').addEventListener('change', function() {
        var experienceSection = document.getElementById('experience-section');
        if (this.value === 'oui') {
            experienceSection.style.display = 'block';
        } else {
            experienceSection.style.display = 'none';
            document.getElementById('experiences-list').innerHTML = ''; // Clear the experiences list
        }
    });

    // Ajoutez un nouvel ensemble de champs lorsque le bouton est cliqué
    document.getElementById('add-experience').addEventListener('click', function() {
        var experiencesList = document.getElementById('experiences-list');
        var index = experiencesList.children.length;
        var newFields = `
            <div class="experience-item">
                <div class="form-group">
                    <label for="fonction${index}">Nom de la fonction</label>
                    <input type="text" class="form-control" name="fonction[]" id="fonction${index}" required>
                </div>
                <div class="form-group">
                    <label for="dateDebut${index}">Date de début</label>
                    <input type="date" class="form-control" name="dateDebut[]" id="dateDebut${index}" required>
                </div>
                <div class="form-group">
                    <label for="dateFin${index}">Date de fin</label>
                    <input type="date" class="form-control" name="dateFin[]" id="dateFin${index}">
                </div>
                <div class="form-group">
                    <label for="type${index}">Type</label>
                    <input type="text" class="form-control" name="type[]" id="type${index}" required>
                </div>
                <div class="form-group">
                    <label for="structure${index}">Nom de la structure</label>
                    <input type="text" class="form-control" name="structure[]" id="structure${index}" required>
                </div>
                <div class="form-group">
                    <label for="ville${index}">Ville</label>
                    <input type="text" class="form-control" name="ville[]" id="ville${index}" required>
                </div>
                <div class="form-group">
                    <label for="pays${index}">Pays</label>
                    <input type="text" class="form-control" name="pays[]" id="pays${index}" required>
                </div>
                <button type="button" class="remove-experience btn btn-danger">Supprimer</button>
            </div>
        `;
        experiencesList.insertAdjacentHTML('beforeend', newFields);
    });

    // Supprimez un ensemble de champs lorsqu'un bouton de suppression est cliqué
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-experience')) {
            e.target.parentElement.remove();
        }
    });        
    </script>

    <script>
        //script pour ajouter dynamiquement les responsabilités administrative nationales

        document.getElementById('respadminAu').addEventListener('change', function() {
            const dynamicFields = document.getElementById('respadminDynamic');
            dynamicFields.innerHTML = ''; // Clear previous fields

            if (this.value === 'oui') {
                // Create and append the button to add fields
                const addBtn = document.createElement('button');
                addBtn.textContent = 'Ajouter une responsabilité';
                addBtn.className = 'add-btn';
                addBtn.type = 'button'; // Prevent form submission
                addBtn.addEventListener('click', function() {
                    addResponsibilityField();
                });
                dynamicFields.appendChild(addBtn);

                // Add the first responsibility field
                addResponsibilityField();
            }
        });

        function addResponsibilityField() {
            const container = document.createElement('div');
            container.className = 'field';

            container.innerHTML = `
                <div class="form-group">
                    <label for="responsibilityTitle">Intitulé de la responsabilité</label>
                    <input type="text" name="responsibilityTitle[]" placeholder="Titre">
                </div>

                 <div class="form-group">
                    <label for="responsibilityType">Type de la responsabilité</label>
                    <input type="text" name="responsibilityType[]" placeholder="Titre">
                </div>
                
                <div class="form-group">
                    <label for="startDate">Date de commencement</label>
                    <input type="date" name="startDate[]">
                </div>
                <div class="form-group">
                    <label for="endDate">Date de fin</label>
                    <input type="date" name="endDate[]">
                </div>
                <div class="form-group">
                    <label for="structure">Structure</label>
                    <input type="text" name="structure[]" placeholder="Structure">
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" name="city[]" placeholder="Ville">
                </div>
                <div class="form-group">
                    <label for="country">Pays</label>
                    <input type="text" name="country[]" placeholder="Pays">
                </div>
                <button type="button" class="remove-btn" onclick="removeField(this)">Supprimer</button>
            `;

            document.getElementById('respadminDynamic').appendChild(container);
        }

        function removeField(button) {
            const field = button.parentElement;
            field.remove();
        }
        
    </script>
    
@endsection