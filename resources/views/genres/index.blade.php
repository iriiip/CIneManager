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

    <a href="{{ route('genres.create') }}">Crear género</a>
    <table>
        @foreach($genres as $genre)
        <tr>
            <td>{{ $genre->name }}</td>
            <td>
                <a href="{{ route('genres.edit', $genre->id) }}">Editar</a>
            
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
                    @csrf
                    @method('delete') <button type="submit">Eliminar</button>
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