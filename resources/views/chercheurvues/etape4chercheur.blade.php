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
                                <div class="card-head info bg-light"> <h3>Experiences Nationales</h3></div>


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
                                        <!-- Expériences professionnelles -->
                                        <div class="form-group">
                                            <label for="expadmin" class="label-form">Expériences professionnelles exercées
                                                au plan national</label>
                                            <select name="expadmin" id="expadmin" class="form-control">
                                                <option value="non" selected>Non</option>
                                                <option value="oui">Oui</option>

                                            </select>
                                        </div>
                                        <br>

                                        <div id="dynamic-fields" class="d-none">
                                            <h3>Ajouter une expérience</h3>
                                            @php
                                                $experiences = old('experiences', session('data4.experiences', []));
                                            @endphp


                                            <div id="experience-container">
                                                @foreach ($experiences as $index => $experience)
                                                    <div class="form-group">
                                                        <label for="intitule_{{ $index }}">Intitulé de la
                                                            fonction</label>
                                                        <input type="text"    name="experiences[{{ $index }}][intitule]"
                                                            id="intitule_{{ $index }}" class="form-control"
                                                            value="{{ $experience['intitule'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="structure_{{$index }}">Structure</label>
                                                        <input type="text" value="{{ $experience['structure'] ?? '' }}" name="experiences[{{ $index }}][structure]" id="structure_{{$index }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="debut_{{ $index }}">Début de la fonction</label>
                                                        <input type="date" name="experiences[{{ $index }}][debut]"
                                                            id="debut_{{ $index }}" class="form-control"
                                                            value="{{ $experience['debut'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fin_{{ $index }}">Fin de la fonction</label>
                                                        <input type="date" name="experiences[{{ $index }}][fin]"
                                                            id="fin_{{ $index }}" class="form-control"
                                                            value="{{ $experience['fin'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ville_{{ $index }}">Ville</label>
                                                        <input type="text" name="experiences[{{ $index }}][ville]}"
                                                            id="ville_{{ $index }}" class="form-control"
                                                            value="{{ $experience['ville'] ?? '' }}">
                                                    </div>
                                                    <button type="button" class=" btn btn-danger remove-btn"
                                                        onclick="removeField(this)">Supprimer ce champ</button>
                                                @endforeach

                                                <!-- Champs dynamiques pour ajouter les expériences seront ajoutés ici -->
                                            </div>
                                            <button type="button" id="add-field"
                                                class="btn btn-primary mt-2">Ajouter</button>
                                            <br>
                                        </div>

                                        <!-- Responsabilités administratives -->
                                        <div class="form-group">
                                            <label for="respadmin" class="label-form">Responsabilités administratives
                                                exercées au plan national</label>
                                            <select name="respadmin" id="respadmin" class="form-control">
                                                <option value="non" selected>Non</option>
                                                <option value="oui">Oui</option>

                                            </select>
                                            </select>

                                            </select>

                                        </div>
                                        <br>

                                        <div id="dynamic-container">
                                            <h3>Ajouter une responsabilité</h3>
                                            @php
                                            $responsabilites = old('responsabilites', session('data4.responsabilites', []));
                                        @endphp
                                            <div id="fields-container">
                                                @foreach ($responsabilites as $index => $responsabilite)
                                                <label>Intitulé de la responsabilité:</label>
                                                <input type="text" name="responsabilites[{{ $index }}][intitule]"
                                                value="{{ $responsabilite['intitule'] ?? '' }}" /><br/>
                                                <label>Début:</label>
                                                <input type="date" name="responsabilites[{{ $index }}][debut]"
                                                value="{{ $responsabilite['debut'] ?? '' }}" /><br/>
                                                <label>Fin:</label>
                                                <input type="date" name="responsabilites[{{ $index }}][fin]"
                                                value="{{ $responsabilite['fin'] ?? '' }}" /><br/>
                                                <label>Structure:</label>
                                                <input type="text" name="responsabilites[{{ $index }}][structure]"
                                                value="{{ $responsabilite['structure'] ?? '' }}"/><br/>
                                                <label>Ville:</label>
                                                <input type="text" name="responsabilites[{{ $index }}][ville]"
                                                value="{{ $responsabilite['ville'] ?? '' }}"/><br/>
                                                <button type="button" class=" btn btn-danger remove-button">Supprimer</button>
                                                <hr/>
                                                @endforeach

                                            </div>
                                            <button type="button" id="add-button" class="btn btn-primary mt-2"
                                                style="display: none;">Ajouter</button>
                                            <br>
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
        document.addEventListener('DOMContentLoaded', function() {
            const expadminSelect = document.getElementById('expadmin');
            const dynamicFieldsDiv = document.getElementById('dynamic-fields');
            const experienceContainer = document.getElementById('experience-container');
            const addFieldButton = document.getElementById('add-field');
            let fieldIndex = 0;

            expadminSelect.addEventListener('change', function() {
                if (this.value === 'oui') {
                    dynamicFieldsDiv.classList.remove('d-none');
                } else {
                    dynamicFieldsDiv.classList.add('d-none');
                    experienceContainer.innerHTML = ''; // Clear fields if "Non" is selected
                }
            });

            addFieldButton.addEventListener('click', function() {
                fieldIndex++;
                const newField = document.createElement('div');
                newField.classList.add('mb-3');
                newField.innerHTML = `
                <div class="form-group">
                    <label for="intitule_${fieldIndex}">Intitulé de la fonction</label>
                    <input type="text" name="experiences[${fieldIndex}][intitule]" id="intitule_${fieldIndex}" class="form-control">
                </div>

                 <div class="form-group">
                    <label for="structure_${fieldIndex}">Structure</label>
                    <input type="text" name="experiences[${fieldIndex}][structure]" id="structure_${fieldIndex}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="debut_${fieldIndex}">Début de la fonction</label>
                    <input type="date" name="experiences[${fieldIndex}][debut]" id="debut_${fieldIndex}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fin_${fieldIndex}">Fin de la fonction</label>
                    <input type="date" name="experiences[${fieldIndex}][fin]" id="fin_${fieldIndex}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ville_${fieldIndex}">Ville</label>
                    <input type="text" name="experiences[${fieldIndex}][ville]" id="ville_${fieldIndex}" class="form-control">
                </div>
                <button type="button" class=" btn btn-danger remove-btn" onclick="removeField(this)">Supprimer</button>
            `;
                experienceContainer.appendChild(newField);
            });

            window.removeField = function(button) {
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
                    <input type="text" class="form-control" name="responsabilites[${index}][intitule]"" /><br/>
                    <label>Début:</label>
                    <input type="date" class="form-control" name="responsabilites[${index}][debut]"" /><br/>
                    <label>Fin:</label>
                    <input type="date" class="form-control" name="responsabilites[${index}][fin]" /><br/>
                    <label>Structure:</label>
                    <input type="text"  class="form-control" name="responsabilites[${index}][structure]" /><br/>
                    <label>Ville:</label>
                    <input type="text" class="form-control" name="responsabilites[${index}][ville]" /><br/>
                    <button type="button" class="remove-button btn btn-danger">Supprimer</button>
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
