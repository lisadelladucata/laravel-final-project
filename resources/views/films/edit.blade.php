@extends ("layouts.films")

@section("title", "Modifica il film")

@section ("content")
<form action="{{ route('films.update', $film) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-control mb-3 d-flex flex-column">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" value="{{$film->title}}" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="author">Regista:</label>
        <input type="text" id="author" name="author" value="{{$film->author}}" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="genre_id" >Genere:</label>
        <select name="genre_id" id="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" {{ $film->genre_id === $genre->id ? 'selected' : ''}}>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-control mb-3 d-flex flex-column flex-wrap gap-2">
        <label for="image"> Carica un'immagine</label>
        <input if="image" type="file" name="image" >

        @if($film->image)
            <div id="post-image" >
                <img class="w-25 p-3" src="{{ asset('storage/' . $film->image) }}" alt="copertina" >
            </div>
        @endif

    </div>


    <div class="form-control mb-3 d-flex flex-column">
        <label for="description">Contenuto:</label>
        <textarea id="description" name="description" rows="5"  required> {{$film->description}}</textarea>
    <div>

    <button type="submit" class='btn btn-outline-primary my-3'>Modifica film</button>
</form>

@endsection