<form action="{{ route('promotions.update', $promotion->id) }}" method="POST">
    @csrf
    @method('PUT') <label for="title">Título del Anuncio:</label><br>
    <input type="text" name="title" id="title" value="{{ old('title', $promotion->title) }}" required>
    <br><br>

    <label for="message">Mensaje / Contenido:</label><br>
    <textarea name="message" id="message" rows="4" cols="50" required>{{ old('message', $promotion->message) }}</textarea>
    <br><br>

    <label for="start_date">Fecha de Inicio:</label><br>
    <input type="datetime-local" name="start_date" id="start_date"
        value="{{ $promotion->start_date }}" required>
    <br><br>

    <label for="end_date">Fecha de Fin:</label><br>
    <input type="datetime-local" name="end_date" id="end_date"
        value="{{ $promotion->end_date }}" required>
    <br><br>

    <button type="submit">Actualizar Promoción</button>
</form>