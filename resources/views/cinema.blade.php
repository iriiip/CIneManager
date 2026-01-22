<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <a href="{{ route('genres.index') }}">Generos</a>
    <a href="{{ route('movies.index') }}">Películas</a>

    <form action="{{ route('cinema') }}" method="GET">
        <input type="text" name="search" placeholder="Buscar (título o género)" value="{{ request('search') }}" required>
        <a href="{{ route('cinema') }}">Borrar filtros</a>
        <button type="submit">Buscar</button>
    </form>

    <table>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->synopsis }}</td>
            <td>{{ $movie->duration }} minutos</td>
            <td>{{ $movie->age }} años</td>
            <td>{{ $movie->price }}€</td>
            <td>{{ $movie->genre->name }}</td>
            <td>
                <img src="{{ $movie->getFirstMediaUrl('posters') }}" width="80" alt="Sin imagen">
            </td>
        </tr>
        @endforeach
    </table>
    @if (session('info'))
    {{ session('info') }}
    @endif
</body>

</html>