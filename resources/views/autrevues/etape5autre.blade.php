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

                            @php
                            $experiences=old('experiences',session('etape5.experiences',[]));
                            @endphp
                            <div id="dynamic-fields-container">
                                <!-- Dynamic fields will be appended here -->
                            @foreach ($experiences as $index =>$exp)
                                <div class="exp">
                                <fieldset class="border p-2">
                                       <legend class="scheduler-border float-none w-auto"> <h4>Experience</h4></legend>
                                <div class="form-group">
                                     <label for="experience_{{$index}}">Nom de la fonction</label>
                                    <input type="text" class="form-control" name="experiences[{{$index}}][functionTitle]" value="{{$exp['functionTitle'] ?? ''}}" id="experience_{{$index}}" class="form-control" required>   
                                

                            
                                    <label for="debut_{{$index}}">Debut</label>
                                    <input type="text" name="experiences[{{$index}}][startDate]"  class="form-control"   id="debut_{{$index}}" value="{{$exp['startDate'] ?? ''}}">
                                
                                
                                    <label for="fin_{{$index}}">fin</label>
                                    <input type="text" name="experiences[{{$index}}][endDate]" class="form-control"     id="fin_{{$index}}" value="{{$exp['endDate'] ?? ''}}">

                                

                                
                                    <label for="ville_{{$index}}">Ville</label>
                                      <input type="text" name="experiences[{{$index}}][city]"   class="form-control" id="ville_{{$index}}" value="{{$exp['city'] ?? ''}}">
                            

                                
                                    <label for="structure_{{$index}}">Structure</label>
                                    <input type="text" name="experiences[{{$index}}][structure]"  class="form-control"               id="structure_{{$index}}" value="{{$exp['structure'] ?? ''}}">
                                
                                
                                    <label for="pays_{{$index}}">Pays</label>
                                    <input type="text" name="experiences[{{$index}}][country]"    class="form-control"      id="pays_{{$index}}" value="{{$exp['country'] ?? ''}}">
                                </div>
                                <button type="button" class=" btn btn-danger "  onclick="suppExp(this)">Supprimer </button>
                          </fieldset>
                          </div>
                                @endforeach
                                 
                            

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
                        @php
                            $responsibilities=old('responsibilities', session('etape5.responsibilities',[]));
                        @endphp
                                        <div id="dynamic-responsibility-fields-container">
                                            <!-- Dynamic fields will be appended here -->
                                            
                                            @foreach ($responsibilities as $index => $resp)
                                            <div class="res">
                              <fieldset class="border p-2">   
                                  <legend class="scheduler-border float-none w-auto"><h4>Responsabilite</h4> </legend>             
                        <div class="form-group">

                        <label for="Intitule_{{$index}}">Intitulé de la responsabilité</label>
                        <input type="text" name="responsibilities[{{$index}}][responsibilityTitle]"  value="{{$resp['responsibilityTitle'] ?? ""}}"   id="Intitule_{{$index}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Debut_{{$index}}">Début de la responsabilité</label>
                        <input type="date" name="responsibilities[{{$index}}][startDate]"  value="{{$resp['startDate'] ?? ""}}"         id="Debut_{{$index}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Fin_{{$index}}">Fin de la responsabilité</label>
                        <input type="date" name="responsibilities[{{$index}}][endDate]" id="Fin_{{$index}}"  value="{{$resp['endDate'] ?? ""}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="structure_{{$index}}">Structure</label>
                        <input type="text" name="responsibilities[{{$index}}][structure]"  value="{{$resp['structure'] ?? ""}}"      id="structure_{{$index}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ville_{{$index}}">Ville</label>
                        <input type="text" name="responsibilities[{{$index}}][city]" value="{{$resp['city'] ?? ""}}"  id="ville_{{$index}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pays_{{$index}}">Pays</label>
                        <input type="text" name="responsibilities[{{$index}}][country]" value="{{$resp['country'] ?? ""}}"         id="pays_{{$index}}" class="form-control">
                    </div>
                      <button type="button" class=" btn btn-danger "  onclick="suppRes(this)">Supprimer </button>

                </div>
                 @endforeach
                                              
                 


  <fieldset class="border p-2">

                                        </div>

                                        <!-- Button to add responsibility fields -->
                                        <button type="button" id="add-responsibility-field" class="btn btn-primary mt-3">Ajouter</button>
                
                                   
                                   
                                   
                         </div>
                                   
                         
               

                  
        <div class="btn-group mt-4">
         <a href="{{route('etape4.autre')}}" class="btn btn-warning">Précédent</a>
         <button type="submit" class="btn btn-info">Suivant</button>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    
<script>
    function removeField(button) {
        // Trouve le div le plus proche avec la classe `dynamic-responsibility-fields-container`
        const container = button.closest('.dynamic-responsibility-fields-container');
        if (container) {
            container.remove(); // Supprime le conteneur du DOM
        }
    }
</script>
    
    
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
          <fieldset class="border p-2">
          <legend class="scheduler-border float-none w-auto"><h4>Experience</h4></legend>
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
            </fieldset>
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
               const Index=dynamicResponsibilityFieldsContainer.querySelectorAll('fieldset').length;
                const newFieldset = document.createElement('fieldset');
                newFieldset.classList.add('mb-3','border','p-2' );
                newFieldset.innerHTML = `
                    <legend class="scheduler-border float-none w-auto"><h4>Responsabilité </h4> </legend>
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

                    <button type="button" class="btn btn-danger remove-field" onclick="removeResponsibilityField(this)">Supprimer </button>
                `;
                dynamicResponsibilityFieldsContainer.appendChild(newFieldset);
            });

            // Function to remove a field group
            window.removeField = function(button) {
                button.parentElement.remove();
            }
        }); 

        function removeResponsibilityField(button) {
    const fieldset = button.closest('fieldset');
    if (fieldset) {
        fieldset.remove();
        updateIndices(); // Mettre à jour les indices après la suppression
    }
}


function updateIndices() {
    const fields = dynamicResponsibilityFieldsContainer.querySelectorAll('fieldset');
    fields.forEach((fieldset, index) => {
        const inputs = fieldset.querySelectorAll('input');
        inputs.forEach(input => {
            input.name = input.name.replace(/\[(\d+)\]/, `[${index}]`); // Mise à jour des noms
            input.id = input.id.replace(/\d+/, index); // Mise à jour des IDs
        });

        const legend = fieldset.querySelector('legend h4');
        if (legend) {
            legend.textContent = `Responsabilité ${index + 1}`; // Mise à jour du texte
        }
    });
}
    </script>
    <script>
        function suppExp(button){
          const fieldGroup = button.closest('.exp'); 
          if(fieldGroup)
          {
            fieldGroup.remove();
          }
        }
    </script>

    <script>
        function suppRes(button){
            const fieldGroup=button.closest('.res');
            if(fieldGroup)
        {
            fieldGroup.remove();
        }
        }

    </script>

@endsection