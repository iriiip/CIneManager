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
    <a href="{{ route('cinema') }}">Cartelera</a>

    <a href="{{ route('movies.create') }}">Crear película</a>
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
            <td>
                <a href="{{ route('movies.edit', $movie->id) }}">Editar</a>

                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                    @csrf
                    @method('DELETE') <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @if (session('info'))
        {{ session('info') }}
    @endif
</body>
</html>