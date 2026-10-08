<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Mes Notes</title>
</head>
<body>
     
<div class="container py-5">
    <h1 class="mb-4"> Mes Notes</h1>
    <a href="{{ route('home')}}" class="btn btn-sm btn-primary mb-3"> Home </a>

    <form id="addForm" class="mb-4" data-store-url="{{  route('note.json.store') }}">
        <div class=" row g-2">
            <div class="col-md-4">
                <input type="text" id="titre" class="form-control" placeholder="Titre" required>
            </div>

             <div class="col-md-6">
                <input type="text" id="contenu" class="form-control" placeholder="Contenue (optionnel)">
            </div>

             <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"> Ajouter </button>
            </div>
        </div>
    </form>

    <div id="notesList" class="row g-3 " data-list-url="{{ route('note.json.list') }}"> 
    </div>
</div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="{{ asset('js/notes.js')}}"> </script>
</body>
</html>