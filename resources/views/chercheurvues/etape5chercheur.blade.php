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
                                <div class="card-head info bg-light"><h3>Informations sur les expériences</h3> </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('multi-step-form.next') }}">
                                        @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                        <!-- Expériences professionnelles exercées au plan international -->
                                        <div class="form-group">
                                            <label for="expprofint">Expériences professionnelles exercées au plan international</label>
                                            <select name="expprofint" id="expprofint" class="form-control">
                                                <option value="">Sélectionner</option>
                                                <option value="oui" {{ old('expprofint', session('data5.expprofint')) == 'oui' ? 'selected' : '' }}>Oui</option>
                                                <option value="non" {{ old('expprofint', session('data5.expprofint')) == 'non' ? 'selected' : '' }}>Non</option>
                                            </select> 
                                        </div>

                                        <!-- Div pour ajouter les expériences internationales -->
                                        <div id="experience-container" class="mt-3 {{ old('expprofint', session('data5.expprofint')) == 'oui' ? '' : 'd-none' }}">
                                            <h4>Ajouter une expérience professionnelle</h4>

                                            @php
                                                $experiences = old('experiences', session('data5.experiences', []));

                                            @endphp

                                            <div id="experience-fields-container">
                                                @foreach ($experiences as $index => $experience)
                                                    <div class="form-group">
                                                        <label for="exp_intitule_{{ $index }}">Intitulé</label>
                                                        <input type="text" name="experiences[{{ $index }}][intitule]"
                                                               class="form-control" id="exp_intitule_{{ $index }}"
                                                               value="{{ old("experiences.$index.intitule", $experience['intitule'] ?? '') }}" required>

                                                        <label for="exp_debut_{{ $index }}" class="mt-2">Date debut</label>
                                                        <input type="date" name="experiences[{{ $index }}][debut]"
                                                               class="form-control" id="exp_debut_{{ $index }}"
                                                               value="{{ old("experiences.$index.debut", $experience['debut'] ?? '') }}"
                                                               placeholder="jj/mm/aaaa" required>

                                                         <label for="exp_fin_{{ $index }}" class="mt-2">Date fin</label>
                                                        <input type="date" name="experiences[{{ $index }}][fin]"
                                                                      class="form-control" id="exp_fin_{{ $index }}"
                                                                      value="{{ old("experiences.$index.fin", $experience['fin'] ?? '') }}"
                                                                      placeholder="jj/mm/aaaa" required>

                                                        <label for="exp_institution_{{ $index }}" class="mt-2">Institution</label>
                                                        <input type="text" name="experiences[{{ $index }}][institution]"
                                                               class="form-control" id="exp_institution_{{ $index }}"
                                                               value="{{ old("experiences.$index.institution", $experience['institution'] ?? '') }}" required>

                                                        <label for="exp_ville_{{$index}}" class="mt-2">Ville</label>
                                                        <input type="text" name="experiences[{{ $index }}][ville]" id="exp_ville_{{$index}}"  value="{{ old("experiences.$index.ville       ", $experience['ville'] ?? '') }}" class="form-control"><br>

                                                        <label for="exp_pays_{{$index}}" class="mt-2">Pays</label>
                                                        <input type="text" name="experiences[{{ $index }}][pays]" id="exp_pays_{{$index}}"  value="{{ old("experiences.$index.pays", $experience['pays'] ?? '') }}" class="form-control">
                                                         <button type="button" class=" btn btn-danger "  onclick="removeField(this)">Supprimer </button>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <button type="button" id="add-experience-button" class="btn btn-primary mt-2">Ajouter</button>
                                        </div>

                                        <!-- Responsabilités administratives exercées au plan international -->
                                        <div class="form-group mt-3">
                                            <label for="respprofint">Responsabilités administratives exercées au plan international</label>
                                            <select name="respprofint" id="respprofint" class="form-control">
                                                <option value="">Sélectionner</option>
                                                <option value="oui" {{ old('respprofint', session('data5.respprofint')) == 'oui' ? 'selected' : '' }}>Oui</option>
                                                <option value="non" {{ old('respprofint', session('data5.respprofint')) == 'non' ? 'selected' : '' }}>Non</option>
                                            </select>
                                        </div>

                                        <!-- Div pour ajouter les responsabilités internationales -->
                                        <div id="responsibility-container" class="mt-3 {{ old('respprofint', session('data5.respprofint')) == 'oui' ? '' : 'd-none' }}">
                                            <h4>Ajouter une responsabilité administrative</h4>

                                            @php
                                                $responsabilites = old('responsabilites', session('data5.responsabilites', []));

                                            @endphp

                                            <div id="responsibility-fields-container">
                                                @foreach ($responsabilites as $index => $responsibility)
                                                    <div class="form-group">
                                                        <label for="resp_intitule_{{ $index }}">Intitulé</label>
                                                        <input type="text" name="responsabilites[{{ $index }}][intitule]"
                                                               class="form-control" id="resp_intitule_{{ $index }}"
                                                               value="{{ old("responsabilites.$index.intitule", $responsibility['intitule'] ?? '') }}" required>

                                                        <label for="resp_debut_{{ $index }}" class="mt-2">Date debut</label>
                                                        <input type="date" name="responsabilites[{{ $index }}][debut]"
                                                               class="form-control" id="resp_periode_{{ $index }}"
                                                               value="{{ old("responsabilites.$index.debut", $responsibility['debut'] ?? '') }}"
                                                               placeholder="jj/mm/aaaa" required>
                                                        <label for="resp_fin_{{ $index }}" class="mt-2">Date fin</label>
                                                        <input type="date" name="responsabilites[{{ $index }}][fin]"
                                                                      class="form-control" id="resp_fin_{{ $index }}"
                                                                      value="{{ old("responsabilites.$index.fin", $responsibility['fin'] ?? '') }}"
                                                                      placeholder="jj/mm/aaaa" required>

                                                        <label for="resp_institution_{{ $index }}" class="mt-2">Institution</label>
                                                        <input type="text" name="responsabilites[{{ $index }}][institution]"
                                                               class="form-control" id="resp_institution_{{ $index }}"
                                                               value="{{ old("responsabilites.$index.institution", $responsibility['institution'] ?? '') }}" required>

                                                        
                                                        <label for="resp_ville_{{$index}}" class="mt-2">Ville</label>
                                                        <input type="text" class="form-control"  name="responsabilites[{{ $index }}][ville]" id="resp_ville_{{$index}}" value="{{ old("responsabilites.$index.ville", $responsibility['ville'] ?? '') }}"><br>
                                                        <label for="res_pays_{{$index}}" class="mt-2">Pays</label>
                                                        <input type="text" class="form-control" name="responsabilites[{{ $index }}][pays]" id="res_pays_{{$index}}"    value=" {{ old("responsabilites.$index.pays", $responsibility['pays'] ?? '') }}">
                                                    </div> <button type="button" class=" btn btn-danger "  onclick="removeField(this)">Supprimer </button>
                                                @endforeach
                                            </div>

                                            <button type="button" id="add-responsibility-button" class="btn btn-primary mt-2">Ajouter</button>
                                        </div>

                                        <div class="btn-group mt-4">
                                            <a href="{{ route('multi-step-form.previous') }}" class="btn btn-warning">Précédent</a>
                                            <input type="submit" class="btn btn-info" value="Suivant" />
                                        </div>
                                    </form>


                                    <script>
                                        // Gestion des expériences professionnelles internationales
                                        document.getElementById('expprofint').addEventListener('change', function() {
                                            if (this.value === 'oui') {
                                                document.getElementById('experience-container').classList.remove('d-none');
                                            } else {
                                                document.getElementById('experience-container').classList.add('d-none');
                                            }
                                        });

                                        document.getElementById('add-experience-button').addEventListener('click', function() {
                                            const experienceContainer = document.getElementById('experience-fields-container');
                                            const experienceIndex = experienceContainer.children.length;

                                            const experienceField = `
                                             <fieldset class="border p-2">
                                                <legend class="scheduler-border float-none w-auto"> <h6>Nouvelle Experience</h6>  </legend>
                                                <div class="form-group">
                                                    <label for="exp_intitule_${experienceIndex}">Intitulé</label>
                                                    <input type="text" name="experiences[${experienceIndex}][intitule]"
                                                           class="form-control" id="exp_intitule_${experienceIndex}" required>
                                                    <label for="exp_debut_${experienceIndex}" class="mt-2">Date Debut</label>
                                                    <input type="date" name="experiences[${experienceIndex}][debut]"
                                                           class="form-control" id="exp_debut_${experienceIndex}"
                                                           placeholder="jjmmaaaa-jjmmaaaa" required>
                                                    <label for="exp_fin_${experienceIndex}" class="mt-2">Date fin</label>
                                                        <input type="date" name="experiences[${experienceIndex}][fin]"
                                                                      class="form-control" id="exp_fin_${experienceIndex}"
                                                                       placeholder="jj/mm/aaaa" required>
                                                    <label for="exp_institution_${experienceIndex}" class="mt-2">Institution</label>
                                                    <input type="text" name="experiences[${experienceIndex}][institution]"
                                                           class="form-control" id="exp_institution_${experienceIndex}" required>
                                                    
                                                           <label for="exp_ville_${experienceIndex}" class="mt-2">Ville</label>
                                                    <input type="text" name="experiences[${experienceIndex}][ville]"
                                                           class="form-control" id="exp_ville_${experienceIndex}" required>


                                                          <label for="exp_pays_${experienceIndex}" class="mt-2">Pays</label>
                                                    <input type="text" name="experiences[${experienceIndex}][pays]"
                                                           class="form-control" id="exp_pays_${experienceIndex}" required>


                                                    
                                                    <button type="button" class="remove-experience-button btn btn-danger">Supprimer</button>        
                                                </div>
                                                 </fieldset>
                                            `;

                                            experienceContainer.insertAdjacentHTML('beforeend', experienceField);
                                        });

                                           document.getElementById('experience-fields-container').addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('remove-experience-button')) {
        const fieldset = event.target.closest('fieldset');
        if (fieldset) {
            fieldset.remove();
        }
    }
});

                                        // Gestion des responsabilités administratives internationales
                                        document.getElementById('respprofint').addEventListener('change', function() {
                                            if (this.value === 'oui') {
                                                document.getElementById('responsibility-container').classList.remove('d-none');
                                            } else {
                                                document.getElementById('responsibility-container').classList.add('d-none');
                                            }
                                        });

                                        document.getElementById('add-responsibility-button').addEventListener('click', function() {
                                            const responsibilityContainer = document.getElementById('responsibility-fields-container');
                                            const responsibilityIndex = responsibilityContainer.children.length;

                                            const responsibilityField = `
                                              <fieldset class="border p-2">
                                                     <legend class="scheduler-border float-none w-auto"> <h6>Nouvelle Responsabilite</h6>  </legend>
                                                <div class="form-group">
                                                    <label for="resp_intitule_${responsibilityIndex}">Intitulé</label>
                                                    <input type="text" name="responsabilites[${responsibilityIndex}][intitule]"
                                                           class="form-control" id="resp_intitule_${responsibilityIndex}" required>
                                                    <label for="resp_debut_${responsibilityIndex}" class="mt-2">Date debut</label>
                                                    <input type="date" name="responsabilites[${responsibilityIndex}][debut]"
                                                           class="form-control" id="resp_debut_${responsibilityIndex}"
                                                           placeholder="jj/mm/aaaa" required>
                                                     <label for="resp_fin_${responsibilityIndex}" class="mt-2">Date fin</label>
                                                        <input type="date" name="responsabilites[${responsibilityIndex}][fin]"
                                                                      class="form-control" id="resp_fin_${responsibilityIndex}"
                                                                       placeholder="jj/mm/aaaa" required>
                                                    <label for="resp_institution_${responsibilityIndex}" class="mt-2">Institution</label>
                                                    <input type="text" name="responsabilites[${responsibilityIndex}][institution]"
                                                           class="form-control" id="resp_institution_${responsibilityIndex}" required>

                                                 <label for="resp_ville_${responsibilityIndex}" class="mt-2">Ville</label>
                                                    <input type="text" name="responsabilites[${responsibilityIndex}][ville]"
                                                           class="form-control" id="resp_ville_${responsibilityIndex}" required>
                                                        
                                                <label for="resp_pays_${responsibilityIndex}" class="mt-2">Pays</label>
                                                    <input type="text" name="responsabilites[${responsibilityIndex}][pays]"
                                                           class="form-control" id="resp_pays_${responsibilityIndex}" required>

                                                  <button type="button" class="remove-responsibility-button btn btn-danger">Supprimer</button>
                                                     </fieldset>
                                                </div>
                                            `;

                                            responsibilityContainer.insertAdjacentHTML('beforeend', responsibilityField);
                                        });
                                    </script>
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
                    <input type="text" name="ville_${index}" /> <br/>
                    <label>Pays:</label>
                    <input type="text" name="pays_${index}" /><br/>
                   <button type="button" class="custom-remove-btn">Supprimer</button>
                    <hr/>
                `;
                fieldsWrapper.appendChild(newFieldSet);

                // Ajouter un écouteur d'événements au bouton Supprimer
               newFieldSet.querySelector('.custom-remove-btn').addEventListener('click', function() {
                    fieldsWrapper.removeChild(newFieldSet);
                });
            });
        });
    </script>

    <script>
          window.removeField = function(button) {
        button.parentElement.remove();
    };
    </script>
@endsection
