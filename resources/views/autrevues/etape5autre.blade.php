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
                        <li class="current"><a href="#">Etape5</a></li>
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
    <form action="{{Route('valider5.autre')}}" method="POST">
      @csrf
                         <div class="form-group">
                        <label for="expprofintAu">Expériences professionnelles exercées au plan international</label>
                        <select name="expprofintAu" id="expprofintAu" class="form-control" required>
                            <option value="non" {{ old('expprofintAu', session('form.expprofintAu')) == 'non' ? 'selected' : '' }}>Non</option>
                            <option value="oui" {{ old('expprofintAu', session('form.expprofintAu')) == 'oui' ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>

                    <!-- Sections additionnelles qui apparaissent en fonction de la sélection -->
                    <div id="additional-fields" style="{{ old('expprofintAu', session('form.expprofintAu')) == 'oui' ? 'block' : 'none' }}">

                        @php
                            $foncsIau = old('foncsIau', session('form.foncsIau', []));
                        @endphp

                        @foreach ($foncsIau as $l => $foncIau)
                            <div class="form-group">
                                <label for="title_{{$l}}">Intitulé de la fonction</label>
                                <input type="text" name="foncsIau[{{$l}}][intitule]" value="{{ $foncIau['intitule'] ?? '' }}" id="title_{{$l}}" class="form-control" required>
                            </div>
                            <!-- Autres champs pour chaque fonction -->
                        @endforeach

                        <button type="button" class="btn btn-primary" id="add-field">Ajouter une fonction</button>
                    </div>

                    <div class="form-group">
                        <label for="respintAu">Responsabilités professionnelles exercées au plan international</label>
                        <select name="respintAu" id="respintAu" class="form-control" required>
                            <option value="non" {{ old('respintAu', session('form.respintAu')) == 'non' ? 'selected' : '' }}>Non</option>
                            <option value="oui" {{ old('respintAu', session('form.respintAu')) == 'oui' ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>

                    <div id="responsibility-section" style="{{ old('respintAu', session('form.respintAu')) == 'oui' ? 'block' : 'none' }}">
                        <div id="responsibility-fields-container">
                            @php
                                $responsibilities = old('responsibility_titles', session('form.responsibility_titles', []));
                            @endphp

                            @foreach ($responsibilities as $i => $responsibility)
                                <div class="form-group">
                                    <label for="responsibility_title_{{$i}}">Intitulé de la responsabilité</label>
                                    <input type="text" name="responsibility_titles[]" value="{{ $responsibility }}" id="responsibility_title_{{$i}}" class="form-control" required>
                                </div>
                                <!-- Autres champs pour chaque responsabilité -->
                            @endforeach

                            <button type="button" class="btn btn-primary" id="add-responsibility">Ajouter une responsabilité</button>
                        </div>
                    </div>

         <button type="submit" class="btn btn-info" value="">Suivant</button>   
         
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
    //Ajouter une fonction
     document.addEventListener('DOMContentLoaded', function() {
        const selectField = document.getElementById('expprofintAu');
        const additionalFields = document.getElementById('additional-fields');
        const responsibilitySection = document.getElementById('responsibility-section');
        const fieldsContainer = document.getElementById('fields-container');
        const addFieldButton = document.getElementById('add-field');
        const respintSelect = document.getElementById('respintAu');
        const responsibilityFieldsContainer = document.getElementById('responsibility-fields-container');
        const addResponsibilityButton = document.getElementById('add-responsibility');

        selectField.addEventListener('change', function() {
            if (this.value === 'oui') {
                additionalFields.style.display = 'block';
            } else {
                additionalFields.style.display = 'none';
            }
        });

        addFieldButton.addEventListener('click', function() {
            let fieldCount = fieldsContainer.children.length;
            const fieldDiv = document.createElement('div');
            fieldDiv.classList.add('field-group');
            fieldDiv.innerHTML = `
                <hr>
                <h5>Fonction ${fieldCount + 1}</h5>
                <div class="form-group">
                    <label for="title_${fieldCount}">Intitulé de la fonction</label>
                    <input type="text" name="foncsIau[${fieldCount}][intitule]" id="title_${fieldCount}" class="form-control" required>
                </div>
                <!-- Autres champs pour la nouvelle fonction -->
                <button type="button" class="btn btn-danger remove-field">Supprimer</button>
            `;
            fieldsContainer.appendChild(fieldDiv);
        });

        fieldsContainer.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-field')) {
                e.target.parentElement.remove();
            }
        });

        respintSelect.addEventListener('change', function() {
            if (this.value === 'oui') {
                responsibilitySection.style.display = 'block';
            } else {
                responsibilitySection.style.display = 'none';
            }
        });

        addResponsibilityButton.addEventListener('click', function() {
            let responsibilityFieldCount = responsibilityFieldsContainer.children.length;
            const fieldDiv = document.createElement('div');
            fieldDiv.classList.add('field-group');
            fieldDiv.innerHTML = `
                <hr>
                <h5>Responsabilité ${responsibilityFieldCount + 1}</h5>
                <div class="form-group">
                    <label for="responsibility_title_${responsibilityFieldCount}">Intitulé de la responsabilité</label>
                    <input type="text" name="responsibility_titles[]" id="responsibility_title_${responsibilityFieldCount}" class="form-control" required>
                </div>
                <!-- Autres champs pour la nouvelle responsabilité -->
                <button type="button" class="btn btn-danger remove-responsibility-field">Supprimer</button>
            `;
            responsibilityFieldsContainer.appendChild(fieldDiv);
        });

        responsibilityFieldsContainer.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-responsibility-field')) {
                e.target.parentElement.remove();
            }
        });
    });
   </script>

   <script>
   
   </script>
@endsection