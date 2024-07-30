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

         <div id="diplomes-fixed-container">
                <div class="diplome">
                    <h4>Diplôme universitaire</h4>
                    <div class="form-group">
                        <label for="nomDipAut_0">Intitulé du diplôme</label>
                        <input type="text" class="form-control" name="diplomes[0][nomDipAut]" required>
                    </div>
                    <div class="form-group">
                        <label for="periodObtAu_0">Période d'obtention</label>
                        <input type="text" class="form-control" name="diplomes[0][periodObtAu]" placeholder="jjmmaa-jjmmaa" required>
                    </div>
                    <div class="form-group">
                        <label for="instObtDip_0">Institution d'obtention</label>
                        <input type="text" class="form-control" name="diplomes[0][instObtDip]" required>
                    </div>
                    <div class="form-group">
                        <label for="paysObtDip_0">Pays</label>
                        <input type="text" class="form-control" name="diplomes[0][paysObtDip]" id="paysObtDip_0">
                    </div>
                    <div class="form-group">
                        <label for="villeObtDip_0">Ville</label>
                        <input type="text" class="form-control" name="diplomes[0][villeObtDip]">
                    </div>
                </div>
            </div>

            <!-- Section dynamique -->
            <div id="diplomes-container">
                <!-- Les nouveaux diplômes seront ajoutés ici -->
            </div>

            <button type="button" class="btn btn-primary" id="add-diplome">Ajouter un diplôme</button>
            <button type="submit" class="btn btn-success">Soumettre</button>
        </form>
    </div>

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
   //ajouter et supprimer diplome
   $(document).ready(function() {
            var index = 1; // Commencez avec l'index 1 pour les nouveaux diplômes

            $('#add-diplome').click(function() {
                var newDiplome = `
                    <div class="diplome">
                        <h4>Diplôme universitaire</h4>
                        <div class="form-group">
                            <label for="nomDipAut_${index}">Intitulé du diplôme</label>
                            <input type="text" class="form-control" name="diplomes[${index}][nomDipAut]" required>
                        </div>
                        <div class="form-group">
                            <label for="periodObtAu_${index}">Période d'obtention</label>
                            <input type="text" class="form-control" name="diplomes[${index}][periodObtAu]" placeholder="jjmmaa-jjmmaa" required>
                        </div>
                        <div class="form-group">
                            <label for="instObtDip_${index}">Institution d'obtention</label>
                            <input type="text" class="form-control" name="diplomes[${index}][instObtDip]" required>
                        </div>
                        <div class="form-group">
                            <label for="paysObtDip_${index}">Pays</label>
                            <input type="text" class="form-control" name="diplomes[${index}][paysObtDip]" id="paysObtDip_${index}">
                        </div>
                        <div class="form-group">
                            <label for="villeObtDip_${index}">Ville</label>
                            <input type="text" class="form-control" name="diplomes[${index}][villeObtDip]">
                        </div>
                        <button type="button" class="btn btn-danger remove-btn">Supprimer</button>
                    </div>
                `;
                $('#diplomes-container').append(newDiplome);
                index++;
            });

            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.diplome').remove();
            });
        });
   
</script>

@endsection