<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="">
        @csrf
        <div class="form-group">
            <h5>Brevets obtenus (Auteur(s), date, intitulé, références)</h5>
            <button>Ajouter </button>
        </div>
        <div class="form-group">
            <h5>Ouvrages scientifiques édités (Auteur(s), année de publication, titre, éditeur, nombre de pages</h5>
            <button>Ajouter</button>
        </div>
        <div class="form-group">
            <h5>Articles dans des ouvrages scientifiques (Auteur(s), année de publication, titre, éditeur, pages )</h5>
            <button>Ajouter</button>
        </div>
        <div class="form-group">
            <h5>Distinctions honorifiques (Intitulé, année)</h5>
            <button>Ajouter</button>
        </div>
        <div class="form-group">
            <label for="contributionAu" id="contributionAu" class="label-form"></label>
            <input type="text" name="contributionAu" id="contributionAu" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Declaration sur l'honneur</label>
            <input type="check" class="form-control">
        </div>
        </div>
    </form>
</body>
</html>