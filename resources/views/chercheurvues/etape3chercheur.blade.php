@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li>Etape2</li>
                        <li class="current"><a href="#">Etape3</a></li>
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
    
        <div class="container">
            <section id="contact" class="contact section">
                <div class="container" data-aos="fade">
                    <div class="row ">
                        <div class="col-2"> </div>
                        <div class="col-8">
                            <div class="card ">
                                <div class="card-head info"> Informations Personnelle</div>
                                <div class="card-body">

   <form method="POST" action="">
        @csrf

        <div class="diplomes-container">
            <!-- Première section de diplôme -->
            <div class="diplome">
                <h4>Diplôme universitaire</h4>
                <div class="form-group">
                    <label for="intitule_1">Intitulé du diplôme</label>
                    <input type="text" class="form-control" id="intitule_1" name="intitule_1" required>
                </div>
                <div class="form-group">
                    <label for="periode_1">Période d'obtention</label>
                    <input type="text" class="form-control" id="periode_1" name="periode_1" placeholder="jjmmaa-jjmmaa" required>
                </div>
                <div class="form-group">
                    <label for="institution_1">Institution d'obtention</label>
                    <input type="text" class="form-control" id="institution_1" name="institution_1" required>
                </div>
            </div>
        </div>

        <!-- Bouton pour ajouter un nouveau diplôme -->
        <div class="form-group">
            <button type="button" id="ajouterDiplome" class="btn btn-primary">Ajouter</button>
        </div><br>

        <!-- Bouton de soumission du formulaire -->
        <button onclick="window.location.href='{{ route('etape4chercheur') }}'" class="btn btn-info">Suivant</button>

    </form>
                    </div>
                            </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>

</div> 
@endsection


@section('scripts')
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

<script>
    $(document).ready(function() {
        var diplomeCount = 1;

        $('#ajouterDiplome').click(function() {
            diplomeCount++;

            var diplomeHtml = `
                <div class="diplome">
                    <hr>
                    <h4>Diplôme universitaire</h4>
                    <div class="form-group">
                        <label for="intitule_${diplomeCount}">Intitulé du diplôme</label>
                        <input type="text" class="form-control" id="intitule_${diplomeCount}" name="intitule_${diplomeCount}" required>
                    </div>
                    <div class="form-group">
                        <label for="periode_${diplomeCount}">Période d'obtention</label>
                        <input type="text" class="form-control" id="periode_${diplomeCount}" name="periode_${diplomeCount}" placeholder="jjmmaa-jjmmaa" required>
                    </div>
                    <div class="form-group">
                        <label for="institution_${diplomeCount}">Institution d'obtention</label>
                        <input type="text" class="form-control" id="institution_${diplomeCount}" name="institution_${diplomeCount}" required>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm supprimerDiplome">Supprimer ce diplôme</button>
            </div>
            `;
                
            $('.diplomes-container').append(diplomeHtml);

            
        });

         $(document).on('click', '.supprimerDiplome', function() {
        $(this).closest('.diplome').remove();
    });
    });
</script>

@endsection