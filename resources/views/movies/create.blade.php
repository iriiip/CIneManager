<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">Título</label>
    <input type="text" name="title" id="" required>
    <br><br>

    <label for="">Sinposis</label>
    <input type="text" name="synopsis" id="" required>
    <br><br>

    <label for="">Duración</label>
    <input type="number" name="duration" id="" required>
    <br><br>

    <label for="">Edad mínima</label>
    <input type="number" name="age" id="" required>
    <br><br>

    <label for="">Precio entrada(€)</label>
    <input type="number" step="any" name="price" id="" required>
    <br><br>

    <label for="">Género</label>
    <select name="genre_id" id="">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label for="">Póster</label>
    <input type="file" name="image">
    <br><br>

    <button type="submit">Guardar</button>
</form>

