<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <form action="">
      @csrf
        <label for="expprofintAu">Expériences professionnelles exercées au plan international</label>
                <select name="expprofintAu" id="expprofintAu">
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                </select>
            </div>

            <div id="dynamic-fields-container"></div>


          

 
      
       <div>
                <label for="respprofintAu">Responsabilités administratives exercées au plan international</label>
                <select name="respprofintAu" id="respprofintAu">
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                </select>
            </div>

            <div class="dynamic-fields-wrapper"></div>

         
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    
    <script>
        //ajouter experience professionnelle internationale
        document.getElementById('expprofintAu').addEventListener('change', function () {
            const container = document.getElementById('dynamic-fields-container');
            container.innerHTML = ''; // Clear previous fields

            if (this.value === 'oui') {
                addDynamicFields();
            }
        });

        function addDynamicFields() {
            const container = document.getElementById('dynamic-fields-container');
            const fieldCount = container.querySelectorAll('.dynamic-field').length;

            const newFields = document.createElement('div');
            newFields.className = 'dynamic-field';
            newFields.dataset.index = fieldCount;

            newFields.innerHTML = `
                <h4>Poste ${fieldCount + 1}</h4>
                <div>
                    <label for="fonction${fieldCount}">Intitulé de la fonction</label>
                    <input type="text" name="fonction[]" id="fonction${fieldCount}">
                </div>
                <div>
                    <label for="dateDebut${fieldCount}">Date de commencement</label>
                    <input type="date" name="dateDebut[]" id="dateDebut${fieldCount}">
                </div>
                <div>
                    <label for="dateFin${fieldCount}">Date de fin</label>
                    <input type="date" name="dateFin[]" id="dateFin${fieldCount}">
                </div>
                <div>
                    <label for="structure${fieldCount}">Structure</label>
                    <input type="text" name="structure[]" id="structure${fieldCount}">
                </div>
                <div>
                    <label for="pays${fieldCount}">Pays</label>
                    <input type="text" name="pays[]" id="pays${fieldCount}">
                </div>
                <div>
                    <label for="ville${fieldCount}">Ville</label>
                    <input type="text" name="ville[]" id="ville${fieldCount}">
                </div>
                <button type="button" class="remove-field">Supprimer ce poste</button>
            `;

            container.appendChild(newFields);

            // Add event listener to the remove button
            newFields.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(newFields);
            });
        }
           
    </script>
    
    <script>
        //script pour ajouter les responsabilites internationales
        document.getElementById('respprofintAu').addEventListener('change', function () {
            const container = document.querySelector('.dynamic-fields-wrapper');
            container.innerHTML = ''; // Clear previous fields

            if (this.value === 'oui') {
                const addButton = document.createElement('button');
                addButton.type = 'button';
                addButton.innerText = 'Ajouter une responsabilité';
                addButton.onclick = addDynamicFields;

                container.appendChild(addButton);
            }
        });

        function addDynamicFields() {
            const container = document.querySelector('.dynamic-fields-wrapper');
            const fieldCount = container.querySelectorAll('.dynamic-field').length;

            const newFields = document.createElement('div');
            newFields.className = 'dynamic-field';
            newFields.dataset.index = fieldCount;

            newFields.innerHTML = `
                <h4>Responsabilité ${fieldCount + 1}</h4>
                <div>
                    <label for="responsabilite${fieldCount}">Intitulé de la responsabilité</label>
                    <input type="text" name="responsabilite[]" id="responsabilite${fieldCount}">
                </div>
                <div>
                    <label for="responsabilite${fieldCount}">Type responsabilité</label>
                    <input type="text" name="typeresponsabilite[]" id="typeresponsabilite${fieldCount}">
                </div>
                <div>
                    <label for="debutResponsabilite${fieldCount}">Début de la responsabilité</label>
                    <input type="date" name="debutResponsabilite[]" id="debutResponsabilite${fieldCount}">
                </div>
                <div>
                    <label for="finResponsabilite${fieldCount}">Fin de la responsabilité</label>
                    <input type="date" name="finResponsabilite[]" id="finResponsabilite${fieldCount}">
                </div>
                <div>
                    <label for="structure${fieldCount}">Structure</label>
                    <input type="text" name="structure[]" id="structure${fieldCount}">
                </div>
                <div>
                    <label for="ville${fieldCount}">Ville</label>
                    <input type="text" name="ville[]" id="ville${fieldCount}">
                </div>
                <div>
                    <label for="pays${fieldCount}">Pays</label>
                    <input type="text" name="pays[]" id="pays${fieldCount}">
                </div>
                <button type="button" class="remove-field">Supprimer cette responsabilité</button>
            `;

            container.appendChild(newFields);

            // Add event listener to the remove button
            newFields.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(newFields);
            });
        }
    </script>
</body>
</html>