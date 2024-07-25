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
        <label for="nomPremierP" class="label-form">Nom du Premier Parrain</label>
        <input type="text" name="nomPremierP" id="nomPremierP" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenomPremierP" class="label-form" id="prenomPremierP">Prenom du Premier Parrain</label>
        <input type="text" name="prenomPremierP" id="prenomPremierP" class="form-control">
    </div>
    <div class="form-group">
        <label for="nomDeuxiemeP" class="label-form"> Nom du Deuxième Parrain</label>
        <input type="text" name="nomDeuxiemeP" id="nomDeuxiemeP" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenomDeuxiemeP" class="label-form">Prenom du Deuxième Parrain</label>
        <input type="text" name="prenomDeuxiemeP" id="prenomDeuxiemeP" class="form-control">
    </div>
    <div class="form-group">
        <label for="college" class="label-form">Collège dans lequel vous souhaitez postuler</label>
        <select name="college" id="titre" class="form-control">
            <option value="1">Sciences et Techniques</option>
            <option value="2">Sciences juridiques, politiques, économiques et de gestion</option>
            <option value="3">Sciences de la santé humaine et animale</option>
            <option value="4">Sciences naturelles et agronomiques</option>
            <option value="5">Sciences humaines, des arts, des lettres et de la communication </option>
        </select>
    </div>
    <div class="form-group">
        <label for="specialite">Precisez votre spécialité dans le collège postulé</label>
        <input type="text" name="specialite" id="specialite" class="form-control">
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>





