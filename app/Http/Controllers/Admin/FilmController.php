<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newFilm = new Film();

        $newFilm->title = $data['title'];
        $newFilm->author = $data['author'];
        $newFilm->genre_id = $data['genre_id'];
        $newFilm->description = $data['description'];

        $newFilm->save();

        return redirect()->route('films.show', $newFilm); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('films.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $data = $request->all();

        $film->title = $data['title'];
        $film->author = $data['author'];
        $film->genre_id = $data['genre_id'];
        $film->description = $data['description'];

        $film->update();

        return redirect()->route('films.show', $film);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index');
    }
}
