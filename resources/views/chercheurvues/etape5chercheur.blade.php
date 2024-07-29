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
                        <li>Etape3</li>
                        <li >Etape4</li>
                        <li class="current"><a href="#">Etape5</a></li>
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
    <form action="">
        @csrf
      <div class="form-group">
            <label for="expprofint">Expériences professionnelles exercées au plan international</label>
            <select name="expprofint" id="expprofint" class="form-control">
                <option value="">Sélectionner</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

           <div id="additional-fields" style="display: none;">
            <!-- Champs supplémentaires à ajouter via JavaScript -->
        </div>

        <button type="button" id="addFieldsBtn" class="btn btn-primary mt-3">Ajouter des champs</button>

       <div class="form-group">
            <label for="respprofint">Responsabilités administratives exercées au plan international</label>
            <select name="respprofint" id="respprofint" class="form-control">
                <option value="">Sélectionner</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        <div id="additional-fields-responsibility" style="display: none;">
            <!-- Champs supplémentaires pour les responsabilités administratives au plan international -->
        </div> 

        <button type="button" id="addFieldsBtnResponsibility" class="btn btn-primary mt-3">Ajouter des champs</button>
        </div> <br>
        
        <button onclick="window.location.href='{{ route('etape6chercheur') }}'" class="btn btn-info">Suivant</button>

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

    //script pour les experiences professionnelles à l'international
    $(document).ready(function() {
        $('#expprofint').change(function() {
            if ($(this).val() === 'oui') {
                $('#additional-fields').slideDown();  // Afficher les champs supplémentaires
            } else {
                $('#additional-fields').slideUp();    // Cacher les champs supplémentaires
            }
        });

        // Action du bouton "Ajouter des champs"
        $('#addFieldsBtn').click(function() {
            $('#additional-fields').append(`
                <div class="mt-3">
                    <input type="text" name="function_name[]" class="form-control" placeholder="Nom de la fonction">
                    <input type="date" name="function_start[]" class="form-control mt-2" placeholder="Période début de la fonction">
                    <input type="date" name="function_end[]" class="form-control mt-2" placeholder="Période fin de la fonction">
                    <input type="text" name="function_structure[]"  class="form-control mt-2" placeholder="Nom de la structure">
                    <input type="text" name="function_pays[]" id="" class="form-control mt-2" placeholder="Pays">
                    <input type="text" name="function_ville[]" id="" class="form-control mt-2"  placeholder="Ville">
                </div>
            `);
        });
    });
</script>

<script>
    //script pour ajouter les responsabilités professionnelles à l'nternational

    
$(document).ready(function() {
        $('#respprofint').change(function() {
            if ($(this).val() === 'oui') {
                $('#additional-fields-responsibility').slideDown();  // Afficher les champs supplémentaires
            } else {
                $('#additional-fields-responsibility').slideUp();    // Cacher les champs supplémentaires
            }
        });

        // Action du bouton "Ajouter des champs"
        $('#addFieldsBtnResponsibility').click(function() {
            $('#additional-fields-responsibility').append(`
                <div class="mt-3">
                    <input type="text" name="responsibility_name[]" class="form-control" placeholder="Nom de la fonction">
                    <input type="date" name="start_date[]" class="form-control mt-2" placeholder="Date de début">
                    <input type="date" name="end_date[]" class="form-control mt-2" placeholder="Date de fin">
                    <input type="text" name="structure_name[]" class="form-control mt-2" placeholder="Nom de la structure">
                    <input type="text" name="city[]" class="form-control mt-2" placeholder="Ville">
                    <input type="text" name="country[]" class="form-control mt-2" placeholder="Pays">
                </div>
            `);
        });
    });
</script>

@endsection