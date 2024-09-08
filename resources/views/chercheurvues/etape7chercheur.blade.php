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
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                        <li class="current"> <a href="#">Etape Finale</a></li>
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
                                <div class="card-head info"> Vos documents</div>

                                <div class="card-body">
                                
                                    <form method="POST" id="fileUploadForm" action="#"
                                        enctype="multipart/form-data">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="cvchercheurDoc">Joindre une copie de votre CV</label><br>
                                            <input type="file" name="cvchercheurDoc" class="form-control"
                                                id="cvchercheurDoc">
                                            <button type="button"
                                                onclick="uploadFile('cvchercheurDoc')">Télécharger</button>
                                            <span id="cvchercheurDocStatus"></span>
                                            <span
                                                id="cvchercheurDoc-name">{{ session('filePaths.cvchercheurDoc') ? basename(session('filePaths.cvchercheurDoc')) : '' }}</span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label for="dipChercheurDoc">Joindre un fichier unique composé de l'ensemble des
                                                diplômes et attestations</label><br>
                                            <input type="file" name="dipChercheurDoc" class="form-control"
                                                id="dipChercheurDoc">
                                            <button type="button"
                                                onclick="uploadFile('dipChercheurDoc')">Télécharger</button>
                                            <span id="dipChercheurDocStatus"></span>
                                            <span
                                                id="dipChercheurDoc-name">{{ session('filePaths.dipChercheurDoc') ? basename(session('filePaths.dipChercheurDoc')) : '' }}</span>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label for="fonctionDoc">Joindre un fichier unique composé de l'ensemble des
                                                arrêtés justifiant les fonctions et responsabilités
                                                professionnelles</label><br>
                                            <input type="file" name="fonctionDoc" class="form-control" id="fonctionDoc">
                                            <button type="button" onclick="uploadFile('fonctionDoc')">Télécharger</button>
                                            <span id="fonctionDocStatus"></span>
                                            <span
                                                id="fonctionDoc-name">{{ session('filePaths.fonctionDoc') ? basename(session('filePaths.fonctionDoc')) : '' }}</span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label for="societeExpertDoc">Joindre un fichier unique justifiant
                                                l'appartenance à un ou plusieurs comités ou sociétés savantes</label><br>
                                            <input type="file" name="societeExpertDoc" class="form-control"
                                                id="societeExpertDoc">
                                            <button type="button"
                                                onclick="uploadFile('societeExpertDoc')">Télécharger</button>
                                            <span id="societeExpertDocStatus"></span>
                                            <span
                                                id="societeExpertDoc-name">{{ session('filePaths.societeExpertDoc') ? basename(session('filePaths.societeExpertDoc')) : '' }}</span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label for="brevetDoc">Joindre un fichier unique des brevets obtenus</label><br>
                                            <input type="file" name="brevetDoc" class="form-control" id="brevetDoc">
                                            <button type="button" onclick="uploadFile('brevetDoc')">Télécharger</button>
                                            <span id="brevetDocStatus"></span>
                                            <span
                                                id="brevetDoc-name">{{ session('filePaths.brevetDoc') ? basename(session('filePaths.brevetDoc')) : '' }}</span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label for="articleDoc">Joindre un fichier unique contenant l'ensemble de vos
                                                articles</label><br>
                                            <input type="file" name="articleDoc" class="form-control" id="articleDoc">
                                            <button type="button" onclick="uploadFile('articleDoc')">Télécharger</button>
                                            <span id="articleDocStatus"></span>
                                            <span
                                                id="articleDoc-name">{{ session('filePaths.articleDoc') ? basename(session('filePaths.articleDoc')) : '' }}</span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label for="ouvrageDoc">Joindre un fichier unique contenant l'ensemble de vos
                                                ouvrages scientifiques. Pour chaque ouvrage, il est demandé une à deux pages
                                                sur lesquelles on peut distinguer le titre, les auteurs et
                                                l'éditeur</label><br>
                                            <input type="file" name="ouvrageDoc" class="form-control" id="ouvrageDoc">
                                            <button type="button" onclick="uploadFile('ouvrageDoc')">Télécharger</button>
                                            <span id="ouvrageDocStatus"></span>
                                            <span
                                                id="ouvrageDoc-name">{{ session('filePaths.ouvrageDoc') ? basename(session('filePaths.ouvrageDoc')) : '' }}</span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label for="distinctionsHonorifiquesDoc">Joindre un fichier unique contenant
                                                l'ensemble de vos distinctions honorifiques</label><br>
                                            <input type="file" name="distinctionsHonorifiquesDoc" class="form-control"
                                                id="distinctionsHonorifiquesDoc">
                                            <button type="button"
                                                onclick="uploadFile('distinctionsHonorifiquesDoc')">Télécharger</button>
                                            <span id="distinctionsHonorifiquesDocStatus"></span>
                                            <span
                                                id="distinctionsHonorifiquesDoc-name">{{ session('filePaths.distinctionsHonorifiquesDoc') ? basename(session('filePaths.distinctionsHonorifiquesDoc')) : '' }}</span>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label for="distinctionsScientifiquesDoc">Joindre un fichier unique contenant
                                                l'ensemble des distinctions scientifiques</label><br>
                                            <input type="file" name="distinctionsScientifiquesDoc"
                                                class="form-control" id="distinctionsScientifiquesDoc">
                                            <button type="button"
                                                onclick="uploadFile('distinctionsScientifiquesDoc')">Télécharger</button>
                                            <span id="distinctionsScientifiquesDocStatus"></span>
                                            <span
                                                id="distinctionsScientifiquesDoc-name">{{ session('filePaths.distinctionsScientifiquesDoc') ? basename(session('filePaths.distinctionsScientifiquesDoc')) : '' }}</span>
                                        </div>
                                        <br />
                                    </form>
                                    <form method="POST" action="{{ route('multi-step-form.next') }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="btn-group mt-4">
                                            <a href="{{ route('multi-step-form.previous') }}"
                                                class="btn btn-warning">Précédent</a>
                                            <input type="submit" class="btn btn-info" value="Suivant" />
                                        </div>
                                    </form>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                    <script>
                                        let csrf_token = "{{csrf_token()}}";
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const fileInputs = document.querySelectorAll('input[type="file"]');
                                            fileInputs.forEach(input => {
                                                input.addEventListener('change', function() {
                                                    const fileName = this.files[0]?.name || 'Aucun fichier sélectionné';
                                                    const spanId = this.id + '-name';
                                                    document.getElementById(spanId).textContent = fileName;
                                                });
                                            });
                                        });

                                        function uploadFile(fileInputId) {
                                            let formData = new FormData();
                                            let fileInput = document.getElementById(fileInputId);
                                            let statusSpan = document.getElementById(fileInputId + 'Status');

                                            if (fileInput.files.length === 0) {
                                                alert("Veuillez sélectionner un fichier.");
                                                return;
                                            }


                                            formData.append("csrf_token", csrf_token);

                                            formData.append(fileInput.name, fileInput.files[0]);

                                            $.ajax({
                                                url: '{{ route('multi-step-form.upload') }}', // Assurez-vous que cette route est correcte
                                                type: 'POST',
                                                data: formData,
                                                processData: false,
                                                contentType: false,
                                                headers: {
                                                    'X-CSRF-TOKEN':  csrf_token  //$('meta[name="csrf-token"]').attr('content')
                                                },
                                                success: function(response) {
                                                    statusSpan.innerHTML = "Fichier téléchargé avec succès.";
                                                    statusSpan.style.color = 'green';
                                                },
                                                error: function(xhr) {
                                                    statusSpan.innerHTML = "Erreur lors du téléchargement du fichier.";
                                                    statusSpan.style.color = 'red';
                                                }
                                            });
                                        }
                                    </script>



                                </div>
                            </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>
@endsection
