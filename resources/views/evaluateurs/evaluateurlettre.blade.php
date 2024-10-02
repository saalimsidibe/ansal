

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ansal BF| Plateforme de depots des candidatures </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>



    <table class="table table-striped table-dark">
<thead>
    <tr>
        <th> Nom</th>
        <th> Prenom</th>
        <th >Date de naissance</th>
        <th> Sexe</th>
        <th>Type de profil</th>
        <th>Titre</th>
        <th>Date de nomination</th>
        <th>Tel mobile</th>
        <th>Email</th>
        <th>Date de Dépôt</th>
        <th>Actions</th>

    </tr>
</thead>
<tbody>
   @foreach ($litteraires as $litteraire )
   <tr>
    <td>{{$litteraire['nom']}}</td>
    <td>{{$litteraire['prenom']}}</td>
    <td>{{$litteraire['datenaissance']}}</td>
    <td>{{$litteraire['sexe']}}</td>
    <td>{{$litteraire['categorie']}}</td>
    <td>{{$litteraire['titre']}}</td>
    <td>{{$litteraire['datenomin']}}</td>
    <td>{{$litteraire['telephone']}}</td>
     <td>{{$litteraire['email']}}</td>
     <td>{{$litteraire['created_at']}}</td>
    <td> <button type="button" class="btn btn-danger "> <a href="{{route('profil.litteraire',$litteraire->id)}}">Voir </a></button></td>
    @endforeach
</tbody>
</table>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>






