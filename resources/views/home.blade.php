<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1> Home </h1>
    <div>
        <form action="{{ route('logoutAction') }}" method="POST">
            @csrf 
            <button> se déconnecter </button>
        </form>
    </div>

    <hr>


    <form action="{{ route ('tache') }}" method="POST">
        @csrf
        <input type="text" name="titre" placeholder="Ajouter une tache">
        <input type="text" name="description" placeholder="Ajouter une description">
        <select name="projet" id="prjet">
            <option value="">inbox</option>
            @foreach ($projets as $projet)
            <option value="{{ $projet->id}}">
                {{$projet->titre}}
            </option>
            @endforeach
        </select>
        <button> Ajouter </button>
    </form>

    <div>
        @foreach ($taches as $tache)
        <div>
            <h3> {{ $tache->titre}}</h3>
            <p>{{$tache->description }}</p>
            <form action="{{ route('supp')}}" method="POST">
                @csrf 
                @method('DELETE')
                <button> supprimer </button>
                <input type="hidden" name="id" value="{{$tache->id}}">
            </form>
            <button type="button" class=""data-bs-toggle="modal" data-bs-target="#{{$tache->id}}"   >modifier </button>
        </div>

        <div class="modal fade" id="{{$tache->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route ('modifier', $tache) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="titre" placeholder="Ajouter une tache" value="{{$tache->titre}}">
                        <input type="text" name="description" placeholder="Ajouter une description" value="{{$tache->description}}" >
                        <select name="projet" id="prjet">
                            <option value="">inbox</option>
                            @foreach ($projets as $projet)
                            <option value="{{ $projet->id}}" 
                            @if ($projet->id === $tache->projets_id) selected @endif>
                                {{$projet->titre}}
                            </option>
                            @endforeach
                        </select>
                        <button> Modifier  </button>
                    </form>
                    
                </div>
                </div>
            </div>
        </div>
        @endforeach 
    </div>

    <hr>

   <div>
        <form action="{{ route('creerprojet') }}" method="POST">
            @csrf
            <input type="text" name="titre" placeholder="Ajouter un titre">
            <button type="submit">Créer</button>
        </form>

        <a href="{{route('home', ['filter' => 'inbox']) }}">inbox</a>
        <a href="{{route('home', ['filter' => 'all']) }}">tous</a>
        @foreach ($projets as $projet)
           <a href = "{{route('home', ['filter' => $projet->id]) }}">{{ $projet->titre }}</a>
            <form action="{{ route('suppprojet') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $projet->id }}">
                <button type="submit">Supprimer</button>
            </form>

        @endforeach

    
    </div>
</div>  

    </div>

    <div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  

</body>
</html>