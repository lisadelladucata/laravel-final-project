@extends ("layouts.films")

@section("title", "Aggiungi un film")

@section ("content")
<form action="{{ route('films.store') }}" method="POST">
    @csrf
    
    <div class="form-control mb-3 d-flex flex-column">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="author">Regista:</label>
        <input type="text" id="author" name="author" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="genre_id" >Genere:</label>
        <select name="genre_id" id="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="description">Contenuto:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
    <div>

    <button type="submit" class='btn btn-outline-primary my-3'>Crea film</button>
</form>

@endsection