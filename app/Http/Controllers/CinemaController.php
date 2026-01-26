<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Promotion;

class CinemaController extends Controller
{
    public function index(Request $request)
    {
        // Movies
        $query = Movie::with('genre');

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {

                // Intentamos buscar por título
                $q->where('title', 'LIKE', "%{$search}%")

                    // Si no encontramos un título buscamos por género
                    ->orWhereHas('genre', function ($qGenre) use ($search) {
                        $qGenre->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $movies = $query->get();

        // Promotions
        $promotions = Promotion::all();

        return view('cinema', compact('movies', 'promotions'));
    }

    public function show(Movie $movie)
    {
        $movie->load('genre');
        return view('show', compact('movie'));
    }
}
