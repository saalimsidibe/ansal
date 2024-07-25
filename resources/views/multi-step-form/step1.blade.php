<!-- resources/views/multi-step-form/step1.blade.php -->

<form action="{{ route('multi-step-form.next') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>

    <div class="mb-3">
        <label for="prenom" class="form-label">Prénoms</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>

    <!-- Autres champs de la première étape -->

    <button type="submit" class="btn btn-primary">Suivant</button>
</form>
