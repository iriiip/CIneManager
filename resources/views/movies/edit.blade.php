<form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Título</label>
    <input type="text" name="title" id="" value="{{ $movie->title }}" required>
    <br><br>

    <label for="">Sinposis</label>
    <input type="text" name="synopsis" id="" value="{{ $movie->synopsis }}" required>
    <br><br>

    <label for="">Duración</label>
    <input type="number" name="duration" id="" value="{{ $movie->duration }}" required>
    <br><br>

    <label for="">Edad mínima</label>
    <input type="number" name="age" id="" value="{{ $movie->age }}" required>
    <br><br>

    <label for="">Precio entrada(€)</label>
    <input type="number" step="any" name="price" id="" value="{{ $movie->price }}" required>
    <br><br>

    <label for="">Género</label>
    <select name="genre_id" id="">
        @foreach($genres as $genre)
            <!-- Elegimos como predeterminado el género al que pertenece la película -->
            <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
        @endforeach
    </select>
    <br>

    <!-- Mostramos la imagen si la tiene -->
    @if($movie->hasMedia('posters'))
        <div style="margin-bottom: 10px;">
            <p>Imagen actual:</p>
            <img src="{{ $movie->getFirstMediaUrl('posters') }}" width="100">
        </div>
    @endif

    <label for="">Póster</label>
    <input type="file" name="image">
    <br><br>

    <button type="submit">Guardar</button>
</form>

