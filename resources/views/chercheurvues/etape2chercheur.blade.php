@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li>Etape1</li>
                        <li class="current"><a href="#">Etape2</a></li>
                        <li>Etape3</li>
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
                                <div class="card-head info"> Parrainage et Collège</div>
                                <div class="card-body">
                                    <form action="{{ route('multi-step-form.next') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nomPremierP" class="label-form">Nom du Premier Parrain</label>
                                            <input type="text" name="nomPremierP" id="nomPremierP" class="form-control"
                                                   placeholder="Entrez le nom du premier parrain"
                                                   value="{{ old('nomPremierP', session('data2.nomPremierP')) }}">
                                            @error('nomPremierP')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="prenomPremierP" class="label-form">Prénom du Premier Parrain</label>
                                            <input type="text" name="prenomPremierP" id="prenomPremierP" class="form-control"
                                                   placeholder="Entrez le prénom du premier parrain"
                                                   value="{{ old('prenomPremierP', session('data2.prenomPremierP')) }}">
                                            @error('prenomPremierP')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nomDeuxiemeP" class="label-form">Nom du Deuxième Parrain</label>
                                            <input type="text" name="nomDeuxiemeP" id="nomDeuxiemeP" class="form-control"
                                                   placeholder="Entrez le nom du deuxième parrain"
                                                   value="{{ old('nomDeuxiemeP', session('data2.nomDeuxiemeP')) }}">
                                            @error('nomDeuxiemeP')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="prenomDeuxiemeP" class="label-form">Prénom du Deuxième Parrain</label>
                                            <input type="text" name="prenomDeuxiemeP" id="prenomDeuxiemeP" class="form-control"
                                                   placeholder="Entrez le prénom du deuxième parrain"
                                                   value="{{ old('prenomDeuxiemeP', session('data2.prenomDeuxiemeP')) }}">
                                            @error('prenomDeuxiemeP')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="college" class="label-form">Collège dans lequel vous souhaitez postuler</label>
                                            <select name="college" id="college" class="form-control">
                                                <option value="">-Choisir-</option>
                                                <option value="1" {{ old('college', session('data2.college')) == '1' ? 'selected' : '' }}>
                                                    Sciences et Techniques
                                                </option>
                                                <option value="2" {{ old('college', session('data2.college')) == '2' ? 'selected' : '' }}>
                                                    Sciences juridiques, politiques, économiques et de gestion
                                                </option>
                                                <option value="3" {{ old('college', session('data2.college')) == '3' ? 'selected' : '' }}>
                                                    Sciences de la santé humaine et animale
                                                </option>
                                                <option value="4" {{ old('college', session('data2.college')) == '4' ? 'selected' : '' }}>
                                                    Sciences naturelles et agronomiques
                                                </option>
                                                <option value="5" {{ old('college', session('data2.college')) == '5' ? 'selected' : '' }}>
                                                    Sciences humaines, des arts, des lettres et de la communication
                                                </option>
                                            </select>
                                            @error('college')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="specialite" class="label-form">Précisez votre spécialité dans le collège postulé</label>
                                            <input type="text" name="specialite" id="specialite" class="form-control"
                                                   placeholder="Entrez votre spécialité"
                                                   value="{{ old('specialite', session('data2.specialite')) }}">
                                            @error('specialite')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <br/>
                                        <a href="{{ route('multi-step-form') }}" class="btn btn-warning">Précédent</a>
                                        <button type="submit" class="btn btn-info">Suivant</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
            </section>
        </div>
    </main>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
@endsection
