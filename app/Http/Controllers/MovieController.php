<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index() {
        // with permite usar una función de la relación creada con otro modelo
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    public function create() {
        // Mandamos los géneros para hacer un input:select en el formulario de creación
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request) {    
        $request->validate([
            'image' => 'image',
        ]);

        // Creamos la película
        $movie = Movie::create($request->all());

        // Guardamos la imágen
        if ($request->hasFile('image')) {
            $movie->addMediaFromRequest('image')->toMediaCollection('posters');
        }

        return redirect()->route('movies.index')->with('info', 'Película creada');
    }

    public function edit($id) {
        $movie = Movie::find($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'image' => 'image',
        ]);

        $movie = Movie::find($id);
        $movie->update($request->all());

        if ($request->hasFile('image')) {
            // Con Spatie se remplaza la imagen fácilmente
            $movie->clearMediaCollection('posters');
            $movie->addMediaFromRequest('image')->toMediaCollection('posters');
        }

        return redirect()->route('movies.index')->with('info', 'Película actualizada');
    }

    public function destroy($id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('info', 'Película eliminada');
    } 
}