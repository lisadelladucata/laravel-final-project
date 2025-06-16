@extends('layouts.films')

@section("title", "Tutti i Film")

@section('content')
<div class="container my-4">

    <div class="mb-4">
        <a href="{{ route('films.create') }}" class="btn btn-primary">
            Aggiungi un nuovo film
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($films as $film)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $film->title }}</h5> 
                    <p class="card-text text-muted mb-2"><strong>Regista:</strong> {{ $film->author }}</p>
                    <p class="card-text text-muted mb-3"><strong>Genere:</strong> {{ $film->genre->name }}</p>
                    <a href="{{ route('films.show', $film) }}" class="btn btn-outline-primary btn-sm">
                        Visualizza Dettagli
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection