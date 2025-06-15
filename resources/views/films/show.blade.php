@extends("layouts.films")

@section("title", $film->title)

@section("content")
<div class="container my-4">
    <div class="d-flex gap-3 mb-4"> 
        <a href="{{ route('films.edit', $film) }}" class="btn btn-warning text-white">
            Modifica
        </a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Elimina
        </button>
    </div>

    <p class="text-muted"><strong>Autore:</strong> {{ $film->author }}</p> 
    <p class="text-muted"><strong>Genere:</strong> {{ $film->genre->name }}</p>

    <hr class="my-4"> 

    <div class="lead">
        <p>{{ $film->description }}</p>
    </div>

    <a href="{{ route('films.index') }}" class="btn btn-secondary mt-4">Torna ai film</a>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il film</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('films.destroy', $film) }}" method="POST" >
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">
                      Elimina
                     </button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection