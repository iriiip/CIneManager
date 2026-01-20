<form action="{{ route('genres.update', $genre->id) }}" method="POST">
    @csrf
    @method('PUT') <label for="">Nombre del género</label>
    <input type="text" name="name" id="" value="{{ $genre->name }}">
    <button type="submit">Actualizar</button>
</form>