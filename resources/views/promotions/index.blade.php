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

    <a href="{{ route('promotions.create') }}">Nueva Promoción</a>

    <table>
        @foreach($promotions as $promo)
        <tr>
            <td>{{ $promo->title }}</td>
            <td>{{ $promo->start_date }}</td>
            <td>{{ $promo->end_date }}</td>
            <td>
                @if($promo->is_active)
                <span style="color:green">Activa</span>
                @else
                <span style="color:red">Inactiva</span>
                @endif
            </td>
            <td>
                <a href="{{ route('promotions.edit', $promo->id) }}">Editar</a>

                <form action="{{ route('promotions.destroy', $promo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar</button>
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