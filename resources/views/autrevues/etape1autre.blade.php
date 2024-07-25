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
   <div class="card-head">Informations Personnelle</div>
    <div class="card-body">
        <form action="">
    @csrf

 <div class="form-group">
    <label for="nomAutre" class="form-label" >Nom</label>
    <input type="text" class="form-control" id="nomAutre" name="nomAutre" required>
</div>
<div class="form-group">
    <label for="prenomAutre" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="prenomAutre" name="prenomAutre" required>
</div>
<div class="form-group">
    <label for="datenaissanceAutre" class="form-label">Date de Naissance</label>
    <input type="text" class="form-control" id="datenaissanceAutre" name="datenaissanceAutre" required>
</div>
<div class="form-group">
    <label for="titreAutre" class="form-label">Titre</label>
    <input type="text" name="titreAutre" id="titreAutre">
</div>

<div class="form-group">
    <label for="numerotelAutre" class="form-label">Numero de telephone</label>
    <input type="text" class="form_control" id="numerotelAutre" name="numerotelAutre">
</div>
<div class="form-group">
    <label for="emailAutre">email</label>
    <input type="email" class="form-control" id="emailAutre">
</div>






</form>
    </div>
</div>


   
    




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
</body>
</html>