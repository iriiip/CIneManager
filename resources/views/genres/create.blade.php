<form action="{{ route('genres.store') }}" method="POST">
    @csrf
    <label for="">Nombre del género</label>
    <input type="text" name="name" id="" required>
    <button type="submit">Crear</button>
</form>