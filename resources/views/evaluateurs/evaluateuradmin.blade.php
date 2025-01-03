<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <header class="header">
         @include('admin.header')
    </header>
    @include('admin.sidebar')
   
   

    <section class="">
        <div class="container-fluid">
            <div class="row">
                 <table class="table table-striped table-dark table table-bordered">
            <thead>
                <tr>
                    <th> Nom</th>
                    <th> Prenom</th>
                    <th>Date de naissance</th>
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
                @foreach ($candidats as $candidat)
                    <tr>
                        <td>{{ $candidat['nom'] }}</td>
                        <td>{{ $candidat['prenom'] }}</td>
                        <td>{{ $candidat['datenaissance'] }}</td>
                        <td>{{ $candidat['sexe'] }}</td>
                        <td>{{ $candidat['categorie'] }}</td>
                        <td>{{ $candidat['titre'] }}</td>
                        <td>{{ $candidat['datenomin'] }}</td>
                        <td>{{ $candidat['telephone'] }}</td>
                        <td>{{ $candidat['email'] }}</td>
                        <td>{{ $candidat['created_at'] }}</td>
                        <td> <button type="button" class="btn btn-danger "> <a
                                    href="{{ route('profil.admin', $candidat->id) }}">Voir</a></button></td>
                @endforeach
            </tbody>

    </div>

            </div>
       
    
    </section>

       



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
