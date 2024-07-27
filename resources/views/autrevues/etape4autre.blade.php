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
      <div class="form-group">
        <label for="expadminAu" class="label-form">Expériences professionnelles exercées au plan national</label>
        <select name="expadminAu" id="expadminAu">
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
        <select name="respadminAu" id="respadminAu">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
    </div>
<!-- Conteneur pour les champs supplémentaires de la responsabilite -->
<div id="responsibility-section" style="display: none;">
    <button type="button" id="add-responsibility" class="btn btn-primary">Ajouter une responsabilité</button>
    <div id="responsibilities-list"></div>
</div>    

    </form>

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
    </script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
</body>
</html>