<!-- resources/views/multi-step-form/step3.blade.php -->

<form action="{{ route('multi-step-form.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="tel_mobile" class="form-label">Tél mobile</label>
        <input type="tel" class="form-control" id="tel_mobile" name="tel_mobile" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <!-- Autres champs de la dernière étape -->

    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
