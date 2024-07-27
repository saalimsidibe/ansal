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
 <div class="diplome" id="diplome-section">
    <h4>Diplôme universitaire</h4>
    <div class="form-group">
        <label for="nomDipAu">Intitulé du diplôme</label>
        <input type="text" class="form-control" id="nomDipAu" name="nomDipAu[]" required>
    </div>
    <div class="form-group">
        <label for="periodDipAu">Période d'obtention</label>
        <input type="text" class="form-control" id="periodDipAu" name="periodDipAu[]" placeholder="jjmmaa-jjmmaa" required>
    </div>
    <div class="form-group">
        <label for="instituDipAu">Institution d'obtention</label>
        <input type="text" class="form-control" id="instituDipAu" name="instituDipAu[]" required>
    </div>
    <div class="form-group">
        <label for="villeAu">Ville</label>
        <input type="text" name="villeAu[]" id="villeAu" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="paysAu">Pays</label>
        <input type="text" name="paysAu[]" id="paysAu" class="form-control" required>
    </div>
    <button type="button" id="add-field" class="btn btn-primary">Ajouter un diplôme</button>
</div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    
    <script>
        //ajouter diplomes
        
    document.getElementById('add-field').addEventListener('click', function() {
        var section = document.getElementById('diplome-section');
        var newFields = `
            <div class="diplome-item">
                <div class="form-group">
                    <label for="nomDipAu">Intitulé du diplôme</label>
                    <input type="text" class="form-control" name="nomDipAu[]" required>
                </div>
                <div class="form-group">
                    <label for="periodDipAu">Période d'obtention</label>
                    <input type="text" class="form-control" name="periodDipAu[]" placeholder="jjmmaa-jjmmaa" required>
                </div>
                <div class="form-group">
                    <label for="instituDipAu">Institution d'obtention</label>
                    <input type="text" class="form-control" name="instituDipAu[]" required>
                </div>
                <div class="form-group">
                    <label for="villeAu">Ville</label>
                    <input type="text" name="villeAu[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paysAu">Pays</label>
                    <input type="text" name="paysAu[]" class="form-control" required>
                </div>
                <button type="button" class="remove-field btn btn-danger">Supprimer</button>
            </div>
        `;
        section.insertAdjacentHTML('beforeend', newFields);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });
    </script>

</body>
</html>