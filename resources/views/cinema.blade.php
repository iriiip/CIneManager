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
    <h1>Admin</h1>
    <a href="{{ route('genres.index') }}">Generos</a>
    <a href="{{ route('movies.index') }}">Películas</a>
    <a href="{{ route('promotions.index') }}">Promociones</a>

    <h1>Promociones</h1>
    <table>
        @foreach($promotions as $promo)
        @if($promo->is_active)
        <tr>
            <td>{{ $promo->title }}</td>
            <td>{{ $promo->start_date }}</td>
            <td>{{ $promo->end_date }}</td>
        </tr>
        @endif
        @endforeach
    </table>

    <h1>Películas</h1>
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