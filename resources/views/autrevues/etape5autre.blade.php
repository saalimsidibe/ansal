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
                        <li >Etape5 </li>
                        <li class="current"><a href="">Etape6</a></li>
                        <li>Etape7</li>
                        <li >Etape Finale</li>
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
                                <div class="card-head info bg-light "> <h3>Experiences internationales</h3></div>
                                <div class="card-body">
                                         <form action="{{Route('valider5.autre')}}" method="POST">
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
                                     <div class="form-group">
                                            <label for="expprofintAu">Expériences professionnelles exercées au plan international</label>
                                            <select name="expprofintAu" id="expprofintAu" class="form-control" required>
                                                    <option value="non" {{ old('expprofintAu', session('form.expprofintAu')) == 'non' ? 'selected' : '' }}>Non</option>
                                                    <option value="oui" {{ old('expprofintAu', session('form.expprofintAu')) == 'oui' ? 'selected' : '' }}>Oui</option>
                                            </select>
                                    </div>

             
                      <div id="experience-fields-container" class="d-none">
                            <!-- Container for dynamic fields -->
                            <div id="dynamic-fields-container">
                                <!-- Dynamic fields will be appended here -->
                            </div>

                            <!-- Button to add fields -->
                            <button type="button" id="add-field" class="btn btn-primary mt-3">Ajouter</button>
                        </div>

                      
        
                

                    <div class="form-group">
                        <label for="respintAu">Responsabilités professionnelles exercées au plan international</label>
                        <select name="respintAu" id="respintAu" class="form-control" required>
                            <option value="non" {{ old('respintAu', session('form.respintAu')) == 'non' ? 'selected' : '' }}>Non</option>
                            <option value="oui" {{ old('respintAu', session('form.respintAu')) == 'oui' ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>

                    
                     <div id="responsibility-fields-container" class="d-none">
                                        <!-- Container for dynamic responsibility fields -->
                                        <div id="dynamic-responsibility-fields-container">
                                            <!-- Dynamic fields will be appended here -->
                                        </div>

                                        <!-- Button to add responsibility fields -->
                                        <button type="button" id="add-responsibility-field" class="btn btn-primary mt-3">Ajouter</button>
                
                                   
                                   
                                   
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
    

    //Ajouter une fonction
    
   <script>
  document.addEventListener('DOMContentLoaded', function() {
    const expprofintSelect = document.getElementById('expprofintAu');
    const experienceFieldsContainer = document.getElementById('experience-fields-container');
    const dynamicFieldsContainer = document.getElementById('dynamic-fields-container');
    const addFieldButton = document.getElementById('add-field');
    let fieldIndex = 0;

    // Toggle dynamic fields visibility based on the select value
    expprofintSelect.addEventListener('change', function() {
        if (this.value === 'oui') {
            experienceFieldsContainer.classList.remove('d-none');
        } else {
            experienceFieldsContainer.classList.add('d-none');
            dynamicFieldsContainer.innerHTML = ''; // Clear fields if "Non" is selected
        }
    });

    // Add new field group
    addFieldButton.addEventListener('click', function() {
        fieldIndex++;
        const newField = document.createElement('div');
        newField.classList.add('mb-3');
        newField.innerHTML = `
            <div class="form-group">
                <label for="functionTitle_${fieldIndex}">Intitulé de la fonction</label>
                <input type="text" name="experiences[${fieldIndex}][functionTitle]" id="functionTitle_${fieldIndex}" class="form-control">
            </div>

            <div class="form-group">
                <label for="startDate_${fieldIndex}">Début de la fonction</label>
                <input type="date" name="experiences[${fieldIndex}][startDate]" id="startDate_${fieldIndex}" class="form-control">
            </div>

            <div class="form-group">
                <label for="endDate_${fieldIndex}">Fin de la fonction</label>
                <input type="date" name="experiences[${fieldIndex}][endDate]" id="endDate_${fieldIndex}" class="form-control">
            </div>

            <div class="form-group">
                <label for="structure_${fieldIndex}">Structure</label>
                <input type="text" name="experiences[${fieldIndex}][structure]" id="structure_${fieldIndex}" class="form-control">
            </div>

            <div class="form-group">
                <label for="city_${fieldIndex}">Ville</label>
                <input type="text" name="experiences[${fieldIndex}][city]" id="city_${fieldIndex}" class="form-control">
            </div>

            <div class="form-group">
                <label for="country_${fieldIndex}">Pays</label>
                <input type="text" name="experiences[${fieldIndex}][country]" id="country_${fieldIndex}" class="form-control">
            </div>

            <button type="button" class="btn btn-danger remove-field" onclick="removeField(this)">Supprimer </button>
        `;
        dynamicFieldsContainer.appendChild(newField);
    });

    // Function to remove a field group
    window.removeField = function(button) {
        button.parentElement.remove();
    };
});
   </script>

   <script>
        document.addEventListener('DOMContentLoaded', function() {
            const respintSelect = document.getElementById('respintAu');
            const responsibilityFieldsContainer = document.getElementById('responsibility-fields-container');
            const dynamicResponsibilityFieldsContainer = document.getElementById('dynamic-responsibility-fields-container');
            const addResponsibilityFieldButton = document.getElementById('add-responsibility-field');
            var Index = 0;

            // Toggle dynamic fields visibility based on the select value
            respintSelect.addEventListener('change', function() {
                if (this.value === 'oui') {
                    responsibilityFieldsContainer.classList.remove('d-none');
                } else {
                    responsibilityFieldsContainer.classList.add('d-none');
                    dynamicResponsibilityFieldsContainer.innerHTML = ''; // Clear fields if "Non" is selected
                }
            });

            // Add new field group
            addResponsibilityFieldButton.addEventListener('click', function() {
                Index++;
                const newFieldset = document.createElement('fieldset');
                newFieldset.classList.add('mb-3');
                newFieldset.innerHTML = `
                    <legend>Responsabilité ${Index}</legend>
                    <div class="form-group">
                        <label for="responsibilityTitle_${Index}">Intitulé de la responsabilité</label>
                        <input type="text" name="responsibilities[${Index}][responsibilityTitle]" id="responsibilityTitle_${Index}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="responsibilityStartDate_${Index}">Début de la responsabilité</label>
                        <input type="date" name="responsibilities[${Index}][startDate]" id="responsibilityStartDate_${Index}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="responsibilityEndDate_${Index}">Fin de la responsabilité</label>
                        <input type="date" name="responsibilities[${Index}][endDate]" id="responsibilityEndDate_${Index}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="responsibilityStructure_${Index}">Structure</label>
                        <input type="text" name="responsibilities[${Index}][structure]" id="responsibilityStructure_${Index}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="responsibilityCity_${Index}">Ville</label>
                        <input type="text" name="responsibilities[${Index}][city]" id="responsibilityCity_${Index}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="responsibilityCountry_${Index}">Pays</label>
                        <input type="text" name="responsibilities[${Index}][country]" id="responsibilityCountry_${Index}" class="form-control">
                    </div>

                    <button type="button" class="btn btn-danger remove-field" onclick="removeField(this)">Supprimer </button>
                `;
                dynamicResponsibilityFieldsContainer.appendChild(newFieldset);
            });

            // Function to remove a field group
            window.removeField = function(button) {
                button.parentElement.remove();
            }
        }); 
    </script>
@endsection