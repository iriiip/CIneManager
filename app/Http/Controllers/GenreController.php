<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // Read
    public function index()
    {
        $genres = Genre::all();

        return view("genres.index", compact('genres'));
    }

    // Create
    public function create()
    {
        return view('genres.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            // Verify that name is unique
            'name' => 'unique:genres,name',
        ]);

        Genre::create($request->all());

        return redirect(route('genres.index'))->with('success', 'Género creado');
    }

    // Edit 
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('genres.edit', compact('genre'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            // Verify that name is unique, except from self
            'name' => 'unique:genres,name, ' . $id,
        ]);

        $genre = Genre::find($id);

        $genre->update($request->all());

        return redirect(route('genres.index'))->with('success', 'Género actualizado');
    }

    // Destroy 
    public function destroy($id)
    {
        $genre = Genre::find($id);

        $genre->delete();

        return redirect(route('genres.index'))->with('success', 'Género eliminado');
    }
}