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
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                </select>
            </div>


            @php
                $fncIau = old('foncsIau', session('etape5.foncsIau', []));
            @endphp

                <div id="additional-fields" style="display: none;">
            
                <div id="fields-container">
                    <div class="field-group">
                          <hr>
                    <h5>Fonction ${fieldCount}</h5>
                    <div class="form-group">
                        <label for="title_${fieldCount}">Intitulé de la fonction</label>
                        <input type="text" name="foncsIau[fieldCount][intitule]" id="title_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_${fieldCount}">Début</label>
                        <input type="date" name="foncsIau[fieldCount][debut]" id="start_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_${fieldCount}">Fin</label>
                        <input type="date" name="foncsIau[fieldCount][fin]" id="end_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="organization_${fieldCount}">Structure</label>
                        <input type="text" name="foncsIau[fieldCount][structure]" id="organization_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="country_${fieldCount}">Pays</label>
                        <input type="text" name="foncsIau[fieldCount][pays]" id="country_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city_${fieldCount}">Ville</label>
                        <input type="text" name="foncsIau[fieldCount][ville]" id="city_${fieldCount}" class="form-control" required>
                    </div>
                    </div>
                </div>
            </div>
          

          

 
      
        <div class="form-group">
                <label for="respintAu">Responsabilités professionnelles exercées au plan international</label>
                <select name="respintAu" id="respintAu" class="form-control" required>
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                </select>
            </div>

             <div id="responsibility-section" style="display: none;">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="add-responsibility">Ajouter une responsabilité</button>
                </div>
                <div id="responsibility-fields-container"></div>
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
            const fieldsContainer = document.getElementById('fields-container');
            const addFieldButton = document.getElementById('add-field');

            selectField.addEventListener('change', function() {
                if (this.value === 'oui') {
                    additionalFields.style.display = 'block';
                } else {
                    additionalFields.style.display = 'none';
                }
            });

            let fieldCount = 0;

            addFieldButton.addEventListener('click', function() {
                fieldCount++;
                const fieldDiv = document.createElement('div');
                fieldDiv.classList.add('field-group');
                fieldDiv.innerHTML = `
                    <hr>
                    <h5>Fonction ${fieldCount}</h5>
                    <div class="form-group">
                        <label for="title_${fieldCount}">Intitulé de la fonction</label>
                        <input type="text" name="foncsIau[fieldCount][intitule]" id="title_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_${fieldCount}">Début</label>
                        <input type="date" name="foncsIau[fieldCount][debut]" id="start_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_${fieldCount}">Fin</label>
                        <input type="date" name="foncsIau[fieldCount][fin]" id="end_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="organization_${fieldCount}">Structure</label>
                        <input type="text" name="foncsIau[fieldCount][structure]" id="organization_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="country_${fieldCount}">Pays</label>
                        <input type="text" name="foncsIau[fieldCount][pays]" id="country_${fieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city_${fieldCount}">Ville</label>
                        <input type="text" name="foncsIau[fieldCount][ville]" id="city_${fieldCount}" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-danger remove-field">Supprimer</button>
                `;
                fieldsContainer.appendChild(fieldDiv);
            });

            fieldsContainer.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-field')) {
                    e.target.parentElement.remove();
                }
            });
        });
   </script>

   <script>
    //Ajouter les responsabilites
    document.addEventListener('DOMContentLoaded', function() {
            const respintSelect = document.getElementById('respintAu');
            const responsibilitySection = document.getElementById('responsibility-section');
            const responsibilityFieldsContainer = document.getElementById('responsibility-fields-container');
            const addResponsibilityButton = document.getElementById('add-responsibility');

            respintSelect.addEventListener('change', function() {
                if (this.value === 'oui') {
                    responsibilitySection.style.display = 'block';
                } else {
                    responsibilitySection.style.display = 'none';
                }
            });

            let responsibilityFieldCount = 0;

            addResponsibilityButton.addEventListener('click', function() {
                responsibilityFieldCount++;
                const fieldDiv = document.createElement('div');
                fieldDiv.classList.add('field-group');
                fieldDiv.innerHTML = `
                    <hr>
                    <h5>Responsabilité ${responsibilityFieldCount}</h5>
                    <div class="form-group">
                        <label for="responsibility_title_${responsibilityFieldCount}">Intitulé de la responsabilité</label>
                        <input type="text" name="responsibility_titles[]" id="responsibility_title_${responsibilityFieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responsibility_start_${responsibilityFieldCount}">Début</label>
                        <input type="date" name="responsibility_starts[]" id="responsibility_start_${responsibilityFieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responsibility_end_${responsibilityFieldCount}">Fin</label>
                        <input type="date" name="responsibility_ends[]" id="responsibility_end_${responsibilityFieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responsibility_organization_${responsibilityFieldCount}">Structure</label>
                        <input type="text" name="responsibility_organizations[]" id="responsibility_organization_${responsibilityFieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responsibility_country_${responsibilityFieldCount}">Pays</label>
                        <input type="text" name="responsibility_countries[]" id="responsibility_country_${responsibilityFieldCount}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responsibility_city_${responsibilityFieldCount}">Ville</label>
                        <input type="text" name="responsibility_cities[]" id="responsibility_city_${responsibilityFieldCount}" class="form-control" required>
                    </div>
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
@endsection