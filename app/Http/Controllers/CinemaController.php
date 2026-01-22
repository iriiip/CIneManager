<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;

class CinemaController extends Controller
{
    public function index(Request $request)
    {
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

        return view('cinema', compact('movies'));
    }
}
